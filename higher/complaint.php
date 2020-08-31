<?php
include("../connection.php");
if (isset($_GET['id'])) {
    if (isset($_GET['reply'])) {
        $id = $_GET['id'];
        $reply = $_GET['reply'];
        mysqli_query($connection, "update complaint set police_msg='$reply' where id=$id;");
    }
    $id = $_GET['id'];
    mysqli_query($connection, "update complaint set status='Police Seen' where id=$id;");
    $complaint = mysqli_query($connection, "Select id,subject,location,date,description,status,police_msg from complaint where id=$id;");
    $complaint = mysqli_fetch_all($complaint);
    $compliantid = $complaint[0][0];
    $compliantsubject = $complaint[0][1];
    $compliantlocation = $complaint[0][2];
    $compliantdate = $complaint[0][3];
    $compliantdescription = $complaint[0][4];
    $compliantstatus = $complaint[0][5];
    $compliantpolice_msg = $complaint[0][6];
    $volunteers = mysqli_query($connection, "Select count(distinct name) from volunteers_msg where complaintid=$id;");
    $volunteers = mysqli_fetch_all($volunteers);
    $volunteers = $volunteers[0][0];
    if (isset($_GET['logout'])) {
        header("Location: index.php");
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="../bootstrap.min.css">
            <title>Home</title>
        </head>

        <body>
            <div class="d-flex p-4 justify-content-between bg-info text-white">
                <div class="d-flex">
                    <a href="home.php">
                        <svg height=30 width=30 aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-users fa-w-20">
                            <path fill="white" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" class=""></path>
                        </svg>
                    </a>
                    <h5 class="ml-3 text-white">
                        Police Admin
                    </h5>
                </div>
                <div>
                    <a href="home.php?logout=1&id=<?php echo $_GET['id'] ?>" class="text-white">Log out</a>
                </div>
            </div>
            <!--Compliant Details-->
            <div class="container mt-4 col-6">
                <h5>Compliant Details</h5>
                <table class="table table-bordered mt-4">
                    <tr>
                        <th>
                            ID :
                        </th>
                        <td>
                            <?php echo $id; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Subject :
                        </th>
                        <td>
                            <?php echo $compliantsubject; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Location :
                        </th>
                        <td>
                            <?php echo $compliantlocation; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date :
                        </th>
                        <td>
                            <?php echo $compliantdate; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description :
                        </th>
                        <td>
                            <?php echo $compliantdescription; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Police Message :
                        </th>
                        <td>
                            <?php echo $compliantpolice_msg; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Volunteers Involved :
                        </th>
                        <td>
                            <?php echo $volunteers; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </body>

        </html>
<?php
    }
} else {
    header("Location: index.php");
}
?>