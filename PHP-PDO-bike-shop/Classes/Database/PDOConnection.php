<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 15.04.2018
 * Time: 20:51
 */

class PDOConnection
{
    public function connect(string $dsn = 'mysql:dbname=rueschec;host=projects.htl-villach.at',
                            string $username = 'rueschec',  // the database user
                            string $password = '#cubehanzz2#',      // the password of the database user
                            array $pdoAttributes =
                            [
                                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'", //Set utf8 encoding

                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,   // thows PDOExceptions if any errors occurs
                                PDO::ATTR_PERSISTENT => true                // true = after executing the script
                            ]                                               // the connection to the db remains
                                                                            // and wil be reused
    ):PDO
    {
        return new PDO ($dsn, $username, $password, $pdoAttributes);
    }
}