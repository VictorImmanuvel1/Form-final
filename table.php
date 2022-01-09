<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/6bb4ad5f51.js" crossorigin="anonymous"></script>
    <title>Table</title>
</head>

<body style="background-color:white;">
    <form class="registerform2" method="post">

        <div class="form-header">
            <h1>Registration</h1>
        </div>

        <table border="1" id="m_table" class="table">
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th class="edu">Age</th>
                <th class="edu">Gender</th>
                <th class="edu">UG</th>
                <th>PG</th>
                <th>College-UG</th>
                <th>College-PG</th>
                <th>State</th>
                <th>City</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php
			//fetch data from json
			$data = file_get_contents('messages.json');
			//decode into php array
			$data = json_decode($data);
			$index = 0;
			foreach($data as $row){
				echo "
       
					<tr id='tr".$index."'>
			
						<td>".$row->fname."</td>
						<td>".$row->lname."</td>
						<td>".$row->age."</td>
						<td>".$row->gender."</td>
            <td>".$row->ug."</td>
            <td>".$row->pg."</td>
            <td>".$row->college_ug."</td> 
            <td>".$row->college_pg."</td>
            <td>".$row->states."</td>
            <td>".$row->cities."</td> 
            <td><a href='edit.php?index=".$index."'><i class='far fa-edit'></a></td>                                
            <td><a href='' class='del' id=".$index."><i class='far fa-trash-alt'></a></td>
					</tr>
          
				";
				$index++;
			}
		?>
            </tbody>
        </table>
        <script>
            $(document).ready(function () {
                $("a.del").click(function (e) {
                    e.preventDefault();
                    var id = this.id;


                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'delete.php',
                                    data: { index: id },
                                    dataType: 'json',
                                    error: function () {
                                        $.alert('Error occured!');
                                    },
                                    success: function (data) {
                                        $("#tr" + id).remove();
                                        swal("Poof! Your file has been deleted!", {
                                            icon: "success",
                                        }).then(() => {
                                            location.reload();
                                        })
                                    }
                                });
                            } else {
                                swal("Your file is safe!");
                            }
                        });
                });
            });
        </script>
</body>

</html>
<script>
    function addRowCount(tableAttr) {
        $(tableAttr).each(function () {
            $('th:first-child, thead td:first-child', this).each(function () {
                var tag = $(this).prop('tagName');
                $(this).before('<' + tag + '>S.No</' + tag + '>');
            });
            $('td:first-child', this).each(function (i) {
                $(this).before('<td>' + (i + 1) + '</td>');
            });
        });
    }
    addRowCount('.table');
</script>