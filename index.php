<?php include 'control.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>

    <!--Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body class="">
	<div class="text-center m-auto p-10 font-sans text-lg md:text-xl lg:text-2xl">
		<h2 style="font-style: 'Hervetica';"><span class="font-bold">To-Do List<br></span> using <span class="text-purple-600">PHP</span> <span class="text-amber-600">MySQL</span> and <span class="text-blue-600"><br>Tailwind CSS</span></h2>
	</div>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="mb-9 input_form text-center p-1">

        <!--Required message-->
        <?php if (empty($_POST['task'])) { ?>
            <p class="text-red-600"><?php echo $errors; ?></p>
        <?php } ?>

        <input type="text" name="task" class="task_input m-2 p-3 border-solid border-2 border-slate rounded-md w-9/12 md:w-6/12 lg:w-2/5 shadow-lg">
        <button type="submit" name="submit" id="add_btn" class="add_btn p-3 border-solid border-2 border-black rounded-md shadow-lg text-black hover:bg-gray-200 text-sm md:text-md lg:text-lg">Add Task</button>
	</form>

    <div class="m-auto p-7 border-solid border-2 border-slate rounded-md shadow-lg w-9/12 md:w-6/12 lg:w-2/5">
        <div class="table-header flex justify-between bg-gray-200 rounded-md">
            <div class="pl-6">Tasks</div>
            <div class="pr-6">Action</div>
        </div>

        <div>
            <?php 
            // select all tasks if page is visited or refreshed
            $tasks = mysqli_query($db, "SELECT * FROM tasks");

            $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
            
            <div class="flex justify-between">
                <div class="hidden"><?php echo $i; ?></div>
                <div class="task pl-6"><?php echo $row['task']; ?></div>
                <div class="delete pr-10 text-red-600 text-lg font-normal hover:font-bold"><a href="index.php?del_task=<?php echo $row['id'] ?>">X</a></div>
            </div>

            <?php $i++; } ?>

        </div>
    </div>


</body>
</html>