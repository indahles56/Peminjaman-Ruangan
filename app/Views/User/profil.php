<!DOCTYPE html>
<html>
<head>
    <title>User Profile - Peminjaman Ruang Kelas</title>
</head>
<body>
    <h1>User Profile</h1>
    
    <?php
    // User data (retrieve from the database or any other data source)
    $user = [
        'name' => 'Jane Smith',
        'email' => 'janesmith@example.com',
        'role' => 'Student',
        'classroom' => 'A101',
    ];
    ?>
    
    <h2>Profile Information</h2>
    <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Role:</strong> <?php echo $user['role']; ?></p>
    <p><strong>Classroom:</strong> <?php echo $user['classroom']; ?></p>
    
    <br>
    
    <!-- Room booking form -->
    <h2>Room Booking</h2>
    <form action="process_booking.php" method="post">
        <label for="room">Room:</label>
        <input type="text" name="room" id="room" required><br>
        
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required><br>
        
        <input type="submit" value="Book Room">
    </form>
</body>
</html>
