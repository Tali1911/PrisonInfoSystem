
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prison Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  
   <div class="wrapper">
     <h2>
       Welcome to NRP
       <br>
       Information System
     </h2>
     <div class="button-container">
        <a href="../kpsms/warden/wardenlogin.php"><button  class="theme-button">Staff</button></a>
        <a href="../kpsms/admin/adminlogin.php"><button class="theme-button">Admin</button></a>
     </div>
     <div class="box">
       <div></div>
       <div></div>
       <div></div>
       <div></div>
       <div></div>
       <div></div>
       <div></div>
       <div></div>
       <div></div>
       <div></div>
       <div></div>
       <div></div>
     </div>
   </div> 
<style>
.body {
  margin: 0;
  padding: 0;
}
.wrapper {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background: linear-gradient(90deg, rgb(0, 43, 19) 0%, rgb(9, 121, 24) 35%, rgb(0, 255, 76) 100%);
}

h2 {
  font-family: poppins;
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 50px;
  font-weight: bold;
  color: #fff;
  text-transform: uppercase;
  margin: 0;
}

.button-container {
  position: absolute;
  top: 55%;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 40px;
}

.theme-button {
  padding: 20px 30px;
  font-size: 16px;
  font-weight: bold;
  color: white;
  background-color: rgba(0, 43, 19, 0.8);
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.theme-button:hover {
  background-color: rgba(9, 121, 24, 0.8);
}

.box div {
  position: absolute;
  width: 60px;
  height: 60px;
  background-color: transparent;
  border: 6px solid rgba(255, 255, 255, 0.8);
}

.box div:nth-child(1) {
  top: 12%;
  left: 42%;
  animation: animate 10s linear infinite;
}

.box div:nth-child(2) {
  top: 70%;
  left: 50%;
  animation: animate 7s linear infinite;
}

.box div:nth-child(3) {
  top: 17%;
  left: 6%;
  animation: animate 9s linear infinite;
}

.box div:nth-child(4) {
  top: 20%;
  left: 60%;
  animation: animate 10s linear infinite;
}

.box div:nth-child(5) {
  top: 67%;
  left: 10%;
  animation: animate 6s linear infinite;
}

.box div:nth-child(6) {
  top: 80%;
  left: 70%;
  animation: animate 12s linear infinite;
}

.box div:nth-child(7) {
  top: 60%;
  left: 80%;
  animation: animate 5s linear infinite;
}

.box div:nth-child(8) {
  top: 32%;
  left: 25%;
  animation: animate 16s linear infinite;
}

.box div:nth-child(9) {
  top: 90%;
  left: 25%;
  animation: animate 9s linear infinite;
}

.box div:nth-child(10) {
  top: 20%;
  left: 80%;
  animation: animate 12s linear infinite;
}

.box div:nth-child(11) {
  top: 99%;
  left: 99%;
  animation: animate 20s linear infinite;
}

@keyframes animate {
  0% {
    transform: scale(0) translateY(0) rotate(0);
    opacity: 1;
  }
  100% {
    transform: scale(1.3) translateY(-90px) rotate(360deg);
    opacity: 1;
  }
}
</style>   
</body>
</html>
