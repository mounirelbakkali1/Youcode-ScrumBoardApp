<?php
//INCLUDE DATABASE FILE

include('database.php');
//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();
//$_SESSION['validation'];
//ROUTING
//echo $_POST['save'];
if (isset($_POST['save']))     saveTask();
if (isset($_POST['update']))      updateTask();
if (isset($_POST['delete']))      deleteTask();

function validateDate($date, $format = 'Y-m-d H:i')
{
    $d = date_create_from_format($format, $date);
    return $d && $d->format($format) == $date;
}

function validateInputs($title, $type_id, $priority_id, $status_id, $date_time, $description)
{
    if (empty($title) ||  !is_numeric($type_id) || !is_numeric($priority_id) || !is_numeric($status_id)  || empty($description) || empty($date_time)) {
        $_SESSION['err'] = "* All fields should be filled !";
        $_SESSION['title'] = $title;
        $_SESSION['task_type'] = $type_id;
        $_SESSION['priority_id'] = $priority_id;
        $_SESSION['status_id'] = $status_id;
        $_SESSION['description'] = $description;
        $_SESSION['date'] = $date_time;
        echo "SOMETHING GOES WRONG";


        return false;
    } else if (!validateDate(str_replace("T", " ", $date_time))) {
        $_SESSION['err-date'] = "* invalid format of date time !";
        return false;
    } else {
        return true;
    }
}


function getTasks()
{
    //CODE HERE
    //SQL SELECT
    global $connection;
    $query = "SELECT _task.*,_status.NAME,_type.NAME,_priority.NAME FROM tasks _task,statuses _status,types _type,priorities _priority WHERE _status.ID=_task.STATUS_ID AND _type.ID=_task.TYPE_ID AND _priority.ID = _task.PRIORITY_ID;";
    $result = mysqli_query($connection, $query);
    return $result;
    //echo "Fetch all tasks";
}

function saveTask()
{
    echo "saving task...";
    //CODE HERE
    //SQL INSERT
    // TO PREVENT XSS ATTACK
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $title = $_POST['title'];
        $type_id = isset($_POST['task_type']) ? $_POST['task_type'] : "";
        $priority_id = $_POST['priority_id'];
        $status_id = $_POST['status_id'];
        $date_time = $_POST['date'];
        $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        var_dump(validateInputs($title, $type_id, $priority_id, $status_id, $date_time, $description));
        //($title, $type, $priority, $status, $date, $description
        if (validateInputs($title, $type_id, $priority_id, $status_id, $date_time, $description)) {
            global $connection;
            $val = mysqli_query($connection, "INSERT INTO tasks (TITLE,TYPE_ID,PRIORITY_ID,STATUS_ID,TASK_DATETIME,DESCRIPTION) VALUES ('$title','$type_id', '$priority_id','$status_id','$date_time','$description');");
            if (!$val) {
                echo   mysqli_error($connection);
                die();
            } else {
                $_SESSION['message'] = "Task has been added successfully !";
                echo "added successfuly";
                global $showHint;
                var_dump($showHint);
                //unset($_SESSION['validation']);
            }
            header('location: index.php');
        } else {
            $_SESSION['validation'] = "Please fill all required inputs (valid data)";
            header('location: index.php?err=empty');
            echo "invalid ";
        }
        //header("Refresh:0");

        //echo $date_time;

    }
}

function updateTask()
{
    $title = $_POST['title'];
    $type_id = intval($_POST['task_type']);
    $priority_id = intval($_POST['priority_id']);
    $status_id = intval($_POST['status_id']);
    $date_time = $_POST['date'];
    $description = $_POST['description'];
    $ID = $_POST['id_of_modified_element'];
    global $connection;
    $connection->query("UPDATE tasks SET  TITLE='$title' ,TYPE_ID='$type_id' , PRIORITY_ID='$priority_id', STATUS_ID='$status_id' ,TASK_DATETIME='$date_time',DESCRIPTION='$description' WHERE ID='$ID' ");
    //CODE HERE
    //SQL UPDATE
    $_SESSION['message'] = "Task has been updated successfully !";
    header('location: index.php');
}

function deleteTask()
{
    //CODE HERE
    //SQL DELETE
    $ID = $_POST['id_of_modified_element'];
    global $connection;
    $connection->query("DELETE FROM tasks WHERE ID = $ID");
    $_SESSION['message'] = "Task has been deleted successfully !";
    header('location: index.php');
}
