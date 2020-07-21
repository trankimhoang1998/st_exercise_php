<?php
class productDB
{
    public static function get_product()
    {
        $db= Database::getDB();
        try {
            $query = "SELECT * FROM product";
            $statement = $db->prepare($query);
            $statement->execute();
            $users = $statement->fetchAll();
            return ($users);

        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function addproduct($title, $description, $image, $created_at)
    {
        $db= Database::getDB();
        try {
            $query = "INSERT INTO product
                  (title,description,image,created_at)
                  VALUES (:title,:description,:image,:created_at)
                    ";
            $statement = $db->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':image', $image);
            $statement->bindValue(':created_at', $created_at);
            $statement->execute();
            $statement->closeCursor();

            $book_id = $db->lastInsertId();
            return ($book_id);

        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function deleteproduct($productid)
    {
        $db= Database::getDB();
        try {
            $query = "DELETE FROM product WHERE id=:productid";
            $statement = $db->prepare($query);
            $statement->bindValue(':productid', $productid);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return ($row_count);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    function get_product_by_productid($productid)
    {
        $db= Database::getDB();
        try {
            $query = "SELECT * FROM product WHERE id=?";
            $statement = $db->prepare($query);
            $statement->bindParam(1, $productid);
            $statement->execute();
            $books = $statement->fetch();
            $statement->closeCursor();
            return ($books);

        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function updateproduct($product)
    {
        $db= Database::getDB();
        try {
            $query = "UPDATE product SET
                  title=:title,
                  description=:description,
                  image=:image,
                  created_at=:created_at
                  WHERE id=:id
                    ";
            $statement = $db->prepare($query);

            $statement->bindValue(':title', $product['title']);
            $statement->bindValue(':description', $product['description']);
            $statement->bindValue(':image', $product['image']);
            $statement->bindValue(':created_at', $product['created_at']);
            $statement->bindValue(':id', $product['id']);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return ($row_count);

        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }
}