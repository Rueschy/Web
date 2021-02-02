<?php
require_once 'Classes/Database/PDOConnection.php';
require_once 'Classes/User_Admin.php';

class UserAdminContainer extends PDOConnection
{
    public function getAll():array
    {
        $adminList = [];
        $pdo = $this->connect();
        $statement = $pdo->prepare('select `Name`, Password, Admin from UserAdmin');
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();

        while (($row = $statement->fetch()) != null)
        {
            $a = new User_Admin($row['Name'], $row['Password'], $row['Admin']);
            $adminList[$row['Name']] = $a;
        }

        return $adminList;
    }

    public function add($Name, $Password, $Admin) {

        try
        {
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('insert into `UserAdmin`(`Name`, Password, Admin) values (?,?,?)');

            $statement->bindParam(1,$Name);
            $statement->bindParam(2,$Password);
            $statement->bindParam(3,$Admin);

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

    public function change($Name, $Password, $Admin) {
        try{
            $pdo = $this->connect();
            $pdo->beginTransaction();

            $statement = $pdo->prepare('update `UserAdmin` set Password = ?, Admin = ? WHERE `Name` = ? ');

            $statement->bindParam(1,$Password);
            $statement->bindParam(2,$Admin);
            $statement->bindParam(3,$Name);

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

            $statement = $pdo->prepare('delete from `UserAdmin`  where `Name` = ?');

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

            $statement = $pdo->prepare('select `Name`, Password, Admin from `UserAdmin` where `Name` = ?');
            $statement->bindParam(1, $ID);
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $statement->execute();

            $row = $statement->fetch();
            if ($row != null)
            {
                $a = new User_Admin($row['Name'], $row['Password'], $row['Admin']);
                return $a;
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