<?php

require_once 'Classes/Database/PDOConnection.php';
require_once 'Classes/User_Customer.php';

class UserCustomerContainer extends PDOConnection
{
    public function getAll():array
    {
        $userList = [];
        $pdo = $this->connect();
        $statement = $pdo->prepare('select `Name`, Password, Admin, Birthdate, Email, Balance from UserCustomer');
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();

        while (($row = $statement->fetch()) != null)
        {
            $u = new User_Customer($row['Name'], $row['Password'], $row['Admin'], $row['Birthdate'],$row['Email'],$row['Balance']);
            $userList[$row['Name']] = $u;
        }

        return $userList;
    }

    public function add($Name, $Password, $Admin, $Birthdate, $Email, $Balance) {

        try
        {
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('insert into `UserCustomer`(`Name`, Password, Admin, Birthdate, Email, Balance) values (?,?,?,?,?,?)');

            $statement->bindParam(1,$Name);
            $statement->bindParam(2,$Password);
            $statement->bindParam(3,$Admin);
            $statement->bindParam(4,$Birthdate);
            $statement->bindParam(5,$Email);
            $statement->bindParam(6,$Balance);

            $statement->execute();
            $pdo->commit();
            return true;
        }
        catch (PDOException $e)
        {
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        }
        catch (Exception $e)
        {
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        }
        finally {
            $pdo = null;
        }
    }

    public function change($Name, $Password, $Admin, $Birthdate, $Email, $Balance) {
        try{
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('update `UserCustomer` set Password = ?, Admin = ?, Birthdate = ?, Email = ?, Balance = ? WHERE `Name` = ? ');

            $statement->bindParam(1,$Password);
            $statement->bindParam(2,$Admin);
            $statement->bindParam(3,$Birthdate);
            $statement->bindParam(4,$Email);
            $statement->bindParam(5,$Balance);
            $statement->bindParam(6,$Name);

            $statement->execute();

            $pdo->commit();
            return true;

        } catch (PDOException $e){
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        } catch (Exception $e){
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        } finally {
            $pdo = null;
        }
    }

    public function delete($ID) {
        try{
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('delete from `UserCustomer`  where `Name` = ?');

            $statement->bindParam(1,$ID);

            $statement->execute();

            $pdo->commit();
            return true;

        } catch (PDOException $e){
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        } catch (Exception $e){
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        } finally {
            $pdo = null;
        }
    }

    public function get($ID) {
        try {
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('select `Name`, Password, Admin, Birthdate, Email, Balance from `UserCustomer` where `Name` = ?');
            $statement->bindParam(1, $ID);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();

            $row = $statement->fetch();
            if ($row != null)
            {
                $u = new User_Customer($row['Name'], $row['Password'], $row['Admin'],$row['Birthdate'],$row['Email'],$row['Balance']);
                return $u;
            }
            return null;

        }
        catch (PDOException $e)
        {
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        }
        catch (Exception $e)
        {
            if(isset($pdo)){
                $pdo->rollback();
            }
            throw($e);
        }
        finally
        {
            $pdo = null;
        }
    }
}