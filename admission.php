<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admissions Open</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #ecc1ff, #d8a4ff);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 10%, transparent 10.01%);
            background-size: 20px 20px;
            animation: moveBackground 10s linear infinite;
        }

        @keyframes moveBackground {
            from {
                transform: translateY(0) translateX(0);
            }
            to {
                transform: translateY(-100%) translateX(-100%);
            }
        }

        .admission-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            width: 500px;
            animation: fadeIn 1s ease-in-out;
            position: relative;
            z-index: 1;
            
            background-clip: padding-box;
            border-image: linear-gradient(135deg, #b73fcf, #ff6b6b) 1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #b73fcf;
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #b73fcf;
            box-shadow: 0 0 8px rgba(183, 63, 207, 0.3);
            outline: none;
        }

        .form-group textarea {
            resize: none;
        }

        .form-group i {
            position: absolute;
            right: 12px;
            top: 40px;
            color: #b73fcf;
            font-size: 18px;
        }

        .submit-btn {
            display: block;
            margin: 20px auto 0;
            padding: 12px 20px;
            border: none;
            background-color: #c05cd4;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .submit-btn:hover {
            background-color: #b700ff;
            transform: scale(1.05);
        }

        .success-message {
            text-align: center;
            color: green;
            margin-top: 10px;
        }

        .error-message {
            text-align: center;
            color: red;
            margin-top: 10px;
        }

        header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        header h1 {
            font-size: 24px;
            color: #b73fcf;
            font-weight: 600;
        }

        footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            color: #555;
            z-index: 2;
        }

        footer a {
            color: #b73fcf;
            text-decoration: none;
            font-weight: 500;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
   

    

    <div class="admission-container">
        <h2>Admissions Open<br>Apply Now</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
                <i class="fas fa-envelope"></i>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="text" id="contact" name="contact" required>
                <i class="fas fa-phone"></i>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="form-group">
                <label for="course">Course</label>
                <select id="course" name="course" required>
                    <option value="">-- Select Course --</option>
                    <option value="BCA">BCA</option>
                    <option value="BBA">BBA</option>
                    <option value="MCA">MCA</option>
                    <option value="MBA">MBA</option>
                </select>
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="4" required></textarea>
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <button type="submit" class="submit-btn">Submit Application</button>
        </form>
    </div>

    <!-- <footer>
        <p>&copy; 2024 Admissions. All rights reserved. | <a href="#">Privacy Policy</a></p>
    </footer> -->
</body>
</html>