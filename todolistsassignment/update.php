<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $taskId = $_POST['task_id'];
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];

    $sql = "UPDATE tasks SET task_name='$taskName', task_description='$taskDescription' WHERE id=$taskId";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $taskId = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id=$taskId";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Update Task</h1>
        <form method="post" action="" >
            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
            
            <label for="task_name">Task Name:</label>
            <input id="tt"type="text" name="task_name" value="<?php echo $task['task_name']; ?>" required>
            
            <label  for="task_description">Description:</label>
            <textarea id="tt" name="task_description"><?php echo $task['task_description']; ?></textarea>
            
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
