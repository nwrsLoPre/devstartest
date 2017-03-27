<?php
/*
	Модель обычно включает методы выборки данных, это могут быть:
		> методы нативных библиотек pgsql или mysql;
		> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
		> методы ORM;
		> методы для работы с NoSQL;
		> и др.
*/
class Model
{
	private $source;

  function connect()
  {
    global $config;

    if(!is_null($this->source))
      return true;

    $this->source = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db']);

    // проверка соединения
    if(mysqli_connect_errno())
    {
      printf("Соединение с базой не установлено: %s\n", mysqli_connect_error());
      exit();
    }

    $this->q("SET NAMES 'utf8'");
    $this->q('SET collation_connection = "utf8_general_ci"');

    return true;
  }

  public function q($sql)
    {
      //получаем значения всех аргументо arg_list
      $argList = func_get_args(); 
      
      if (count($argList) == 1)
      {
        $stmt = $this->source->prepare($sql);
        $stmt->execute();
        //получаем данные запроса и выводим соответственно..
        return $stmt->get_result();         
      }
      //удаляем первый элемент массива 
      array_shift($argList); 

      //Записываем в $s кол-во параметров
      for ($i=0; $i<count($argList); $i++)
      {
        $s .= 's';
      }
      
      // Добавляем в начало массива $s
      array_unshift($argList, $s);
      //готовим запрос
      $stmt = $this->source->prepare($sql); 
      //Биндим параметры
      call_user_func_array(array($stmt, 'bind_param'), $this->refValues($argList)); 
      
      //Выполняем запрос
      $stmt->execute();
      //Возвращаем массив значений
      return $stmt->get_result(); 
      $stmt->close();
    }

  function select($query)
  {

    $result = $this->q($query);

    if(!$result)
      return null;

    $arrayAssoc = array();

    while($row = $result->fetch_assoc())
    {
      $arrayAssoc[] = $row;
    }

    return $arrayAssoc;
  }
}