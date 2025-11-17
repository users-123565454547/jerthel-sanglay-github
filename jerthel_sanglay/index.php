<?php
// Database configuration
$host = 'localhost';
$dbname = 'student_crud';
$username = 'root';
$password = '';

// Create connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'create') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];
        
        $stmt = $pdo->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $course]);
        header("Location: index.php");
        exit();
    }
    
    if ($action === 'update') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];
        
        $stmt = $pdo->prepare("UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?");
        $stmt->execute([$name, $email, $course, $id]);
        header("Location: index.php");
        exit();
    }
    
    if ($action === 'delete') {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: index.php");
        exit();
    }
}

// Fetch all students
$stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get student for editing
$editStudent = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->execute([$id]);
    $editStudent = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Student Management System</h1>
            <p>Simple CRUD Application</p>
        </header>

        <div class="form-container">
            <h2><?php echo $editStudent ? 'Edit Student' : 'Add New Student'; ?></h2>
            <form method="POST" id="studentForm">
                <input type="hidden" name="action" value="<?php echo $editStudent ? 'update' : 'create'; ?>">
                <?php if ($editStudent): ?>
                    <input type="hidden" name="id" value="<?php echo $editStudent['id']; ?>">
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="name">Student Name *</label>
                    <input type="text" id="name" name="name" 
                           value="<?php echo $editStudent['name'] ?? ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" 
                           value="<?php echo $editStudent['email'] ?? ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="course">Course *</label>
                    <input type="text" id="course" name="course" 
                           value="<?php echo $editStudent['course'] ?? ''; ?>" required>
                </div>
                
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        <?php echo $editStudent ? 'Update Student' : 'Add Student'; ?>
                    </button>
                    <?php if ($editStudent): ?>
                        <a href="index.php" class="btn btn-secondary">Cancel</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="table-container">
            <h2>Student List</h2>
            <?php if (empty($students)): ?>
                <p class="no-data">No students found. Add your first student above!</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($student['id']); ?></td>
                                <td><?php echo htmlspecialchars($student['name']); ?></td>
                                <td><?php echo htmlspecialchars($student['email']); ?></td>
                                <td><?php echo htmlspecialchars($student['course']); ?></td>
                                <td class="actions">
                                    <a href="?edit=<?php echo $student['id']; ?>" class="btn btn-edit">Edit</a>
                                    <form method="POST" style="display: inline;" 
                                          onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                                        <button type="submit" class="btn btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>