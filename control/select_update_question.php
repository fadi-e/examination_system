<?php
if (isset($_GET['question_ID'])) {
    $question_ID = $_GET['question_ID'];
    $conn = dbConnect();

    $query = "SELECT * FROM question WHERE question_ID = " . $question_ID;
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();

    $stmt1 = $conn->prepare("SELECT * FROM test where teacher_ID=" . $_SESSION['teacher_ID']);
    $stmt1->execute();
    $results = $stmt1->fetchAll(PDO::FETCH_ASSOC);
}
?>