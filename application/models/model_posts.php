<?php

class Model_Posts extends Model
{
  public $id = 0;
  public $params = array();

  /**
   * получаем id последнего поста
   *
   * @param null|int $id
   * @return Model_Posts
   */

  public function __construct($id = 0)
  {
    $this->connect();

    $this->id = (int)$id;

    if($this->id > 0)
    {
      $this->params = $this->select('select * from post where id=' . $this->id);
      if(is_array($this->params))
        $this->params = $this->params[0];
    }
  }

  /**
   * получаем id последнего поста
   *
   * @return Id
   */

  public function GetLastId()
  {
    $id = Model::select('select MAX(id) from post');
    return $id[0]["MAX(id)"];
  }

  /**
   * получаем число постов в БД
   *
   * @return countId
   */

  public function GetCountId($year = null, $month = null)
  {
    if(isset($year) AND isset($month))
    {
      $params = "DATE_FORMAT(date, '%Y') = '$year' AND DATE_FORMAT(date, '%c') = '$month'";
    }
    else
    {
      $params = '1';
    }

    $id = Model::select("select COUNT(id) as count from post WHERE $params");

    return $id[0]["count"];
  }

  /**
   * добавляет пост в БД
   *
   * @param array $params
   */

  public function Add($params)
  {
    if($this->id != 0)
      return false;

    if(!$params['name'])
      return false;

    if(!$params['message'])
      return false;

    if($this->q("insert into post (name, date, message) values ('{$params['name']}', NOW(), '{$params['message']}')"))
      return true;

    return false;
  }

  /**
   * обновляет информацию о посте в БД
   *
   * @param array $params
   */

  public function Update($params)
  {
    if($this->id == 0)
      return false;

    if(!$params['name'])
      return false;

    if(!$params['message'])
      return false;

    if($this->q("update post set name = '{$params['name']}', message = '{$params['message']}' where id=" . $this->id))
      return true;

    return false;
  }

  /**
   * получает список постов
   *
   * @param string $select
   * @param string $where
   * @param string $order
   * @param int $limit
   * @param int $offset
   * @return self[]
   */

  public function GetList($select = '*', $where = '', $order = '', $limit = 0, $offset = 0)
  {
    $return = array();
    $res = $this->select('select ' .
      $select . ' from post ' .
      ($where ? ' WHERE ' . $where : '') .
      ($order ? ' ORDER BY ' . $order : '') . ' ' .
      ($limit ? ' LIMIT ' . ($offset ? $offset . ', ' . $limit : $limit) : '') // LIMIT 10;  LIMIT 50, 10
    );

    if(!$res)
      return $return;

    foreach($res as $item)
    {
      $return[] = new self($item['id']);
    }

    return $return;
  }

  /**
   * удаляет пост
   *
   */

  public function Delete()
  {
    if($this->q("delete from post where id=" . $this->id))
      return true;

    return false;
  }

  /**
   * получает список постов сгрупированных по годам и месяцам
   *
   * @return self[]
   */

  public function getArchive()
  {
    $monthNames = array(1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель', 5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь');

    // получить все года и месяца, за которые есть посты
    $archiveList = $this->select('SELECT DATE_FORMAT(date, "%Y") year, DATE_FORMAT(date, "%c") month from post group by year, month ORDER BY year desc, month desc');
    if(!empty($archiveList))
    {
      foreach($archiveList as $k => $item)
      {
        $archiveList[$k]['month_name'] = $monthNames[$item['month']];
      }

    }

    return $archiveList;
  }

  /**
   * получает информацию о текущем посте по id
   *
   */

  public function loadInfoById()
  {
    $postInfo = $this->select("SELECT name as name, message as message, date as date from post WHERE id = '$this->id'");
    if(!empty($postInfo))
    {
      $this->name = $postInfo[0]['name'];
      $this->message = $postInfo[0]['message'];
      $this->date = $postInfo[0]['date'];
    }
  }
}
