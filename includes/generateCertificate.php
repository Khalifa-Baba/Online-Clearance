<?php

include('dbh.php');
require '../tcpdf/tcpdf.php';

session_start();

if (empty($_SESSION['adm_no'])) {
    header("Location: ../login.php");
} else {
}

$adm_no = $_SESSION["adm_no"];

$logo = '../images/UDUSlogo.jpg';

$sql = "SELECT * FROM `students` WHERE adm_no ='$adm_no'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$udus_logo = '../images/UDUSlogo.jpg';
$adm_no = $row['adm_no'];
$firstname = $row['first_name'];
$lastname = $row['surname'];
$fullname = $firstname . " " . $lastname;
$department = $row['dept'];
$faculty = $row['faculty'];
$email = $row['email'];
$phone_no = $row['phone_no'];
$session = $row['session'];


$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set PDF meta information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Umar Khalifa-baba');
$pdf->SetTitle('Clearance Certificate');
$pdf->SetSubject('Clearance Certificate');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Add a page
$pdf->AddPage();

// Set the font
$pdf->SetFont('helvetica', '', 12);

// Header
$pdf->SetY(10);
$pdf->Image($logo, 80, 15, 50, '', 'JPG'); // Your logo or image

//Move down
// $pdf->SetY(70);
// $pdf->Cell(0, 0, 'USMANU DANFODIYO UNIVERSITY', 0, 1, 'C');
// $pdf->Cell(0, 0, 'P.M.B. 2346, SOKOTO, NIGERIA.', 0, 1, 'C');
// $pdf->SetY(85);
// $pdf->Cell(0, 7, "Name: $fullname", 0, 1, 'L');
// $pdf->Cell(0, 7, "Admission Number: $adm_no", 0, 1, 'L');
// $pdf->Cell(0, 7, "Faculty: $faculty", 0, 1, 'L');
// $pdf->Cell(0, 7, "Department: $department", 0, 1, 'L');
// $pdf->Cell(0, 10, "Session: $session", 0, 1, "L");
// $pdf->Cell(0, 10, "Date: $curent_date", 0, 1, 'R');


$pdf->SetY(70);
$pdf->writeHTML
("
<style>
*{
    text-align: justify;
}
table{
    text-align: centre;
}
h3{

}
</style>
<div>
</div><div>
    <h3>Name: $fullname</h3>
    <h3>Admission Number: $adm_no</h3>
    <h3>Faculty: $faculty</h3>
    <h3>Department: $department</h3>
    <h3>Session: $session</h3>
</div>
<div>
    <p>This is to confirm that the above named has been completely cleared from all office in the institution. The candidate has no pending payment and is has passed all his registered courses.  
    </p>
    <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Department</th>
                                <th>Library</th>
                                <th>Clinic</th>
                                <th>Bursary</th>
                                <th>Exam Office</th>
                                <th>Student Affairs</th>
                                <th>Sport Director</th>
                                <th>Chief Security</th>
                                <th>Hostel (If Applicable)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cleared</td>
                                <td>Cleared</td>
                                <td>Cleared</td>
                                <td>Cleared</td>
                                <td>Cleared</td>
                                <td>Cleared</td>
                                <td>Cleared</td>
                                <td>Cleared</td>
                                <td>Cleared</td>
                            </tr>
    </div>
</div>
");
// $pdf->Cell(100, 15, 'Department', 1, 1, 'C');
// $pdf->Cell(100, 15, 'Library', 1, 1, 'C');
// $pdf->Cell(100, 15, 'Clinic', 1, 1, 'C');
// $pdf->Cell(100, 15, 'Bursary', 1, 1, 'C');
// $pdf->Cell(100, 15, 'Exam Office', 1, 1, 'C');
// $pdf->Cell(100, 15, 'Student Affairs', 1, 6, 'C');
// $pdf->Cell(100, 15, 'Sport Director', 1, 7, 'C');
// $pdf->Cell(100, 15, 'Chief Securities', 1, 8, 'C');
// $pdf->Cell(100, 15, 'Hostel', 1, 9, 'C');
// $pdf->Cell(100, 15, 'All to be cleared', 0, 1, 'C');


// Footer
$pdf->SetFont('helvetica', '', 10);
// $pdf->Cell(0, 10, '$stamp', 0, 0, 'R');

// $pdf->MultiCell(0, 10, "Other Details: $otherDetails");
$pdf->Output('certificate.pdf', 'I'); // Output the PDF to the browser

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d ');