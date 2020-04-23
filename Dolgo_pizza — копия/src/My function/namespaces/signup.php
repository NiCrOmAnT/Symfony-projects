<?php namespace signup
  $users[] = array('FIO' => 'Nureev Marat', 'email' => 'maratnureev@mail.ru', 'password' => '123', 'address' => 'address' );
  file_put_contents('data.json', json_encode($users));
  unset($users);