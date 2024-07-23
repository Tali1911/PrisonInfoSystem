<?php
include ('header.php');
include ('navbar.php');
include("../admin/inc/adminfetch.php");
if(empty($_SESSION['admin-username'])) {
    header("Location: adminlogin.php");
}

if(isset($_POST["btncreate"])) {
    $fname = $_POST["fname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"];
    $id_no = $_POST["id"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $region = $_POST["region"];    
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $emergency_name = $_POST["e_name"];
    $emergency_relation = $_POST["e_relation"];
    $emergency_no = $_POST["e_no"];
    $doa = $_POST["doa"];
    $p_facility = $_POST["facility"];
    $cell_no = $_POST["cell_no"];
    $start_date = $_POST["s_date"];
    $end_date = $_POST["e_date"];
    $offence = $_POST["offence"];
    $security_level = $_POST["level"];
    $conditions = $_POST["conditions"];
    $medication = $_POST["med"];
    $remarks = $_POST["remarks"];
    $location = $_POST["avatar"];

    $file_type = $_FILES['avatar']['type']; //returns the mimetype
    $allowed = array("image/jpg", "image/jpeg", "image/webp", "image/png", "image/gif", "image/pjpeg", "image/x-png");

    if(!in_array($file_type, $allowed)) {
        $_SESSION['error'] = 'Only jpg, jpeg, Webp, gif, and png files are allowed. Uploaded file type: ' . $file_type;
    } else {
        $image = addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
        $image_name = addslashes($_FILES['avatar']['name']);
        $image_size = getimagesize($_FILES['avatar']['tmp_name']);
        move_uploaded_file($_FILES["avatar"]["tmp_name"], "uploadImage/Inmates/" . $_FILES["avatar"]["name"]);
        $location = "uploadImage/Inmates/" . $_FILES["avatar"]["name"];
    }

    ///check if inmate already exists
    $stmt = $dbh->prepare("SELECT * FROM inmates WHERE IdentificationNumber=?");
    $stmt->execute([$id_no]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['error'] = 'Inmate Already Exist in our Database ';
    } else {
        // Add User details
        $sql6 = 'INSERT INTO inmates(FullName, DateOfBirth, Gender, Nationality, IdentificationNumber, Address, City, Region, Country, ContactNumber, EmergencyContactName, EmergencyContactRelationship, EmergencyContactNumber, DateOfAdmission, PrisonFacility, CellNumber, SentenceStartDate, SentenceEndDate, Offense, SecurityLevel, MedicalConditions, Medication, Remarks, Photo) VALUES(:fname, :dob, :gender, :nationality, :id, :address, :city, :region, :country, :phone, :e_name, :e_relation, :e_no, :doa, :facility, :cell_no, :s_date, :e_date, :offence, :level, :conditions, :med, :remarks, :photo)';
        $statement = $dbh->prepare($sql6);
        $statement->execute([
            ':fname' => $fname,
            ':dob' => $dob,
            ':gender' => $gender,
            ':nationality' => $nationality,
            ':id' => $id_no,
            ':address' => $address,
            ':city' => $city,
            ':region' => $region,            
            ':country' => $country,
            ':phone' => $phone,
            ':e_name' => $emergency_name,
            ':e_no' => $emergency_no,
            ':e_relation' => $emergency_relation,
            ':doa' => $doa,
            ':facility' => $p_facility,
            ':cell_no' => $cell_no,
            ':s_date' => $start_date,
            ':e_date' => $end_date,
            ':offence' => $offence,
            ':level' => $security_level,
            ':conditions' => $conditions,
            ':med' => $medication,
            ':remarks' => $remarks,
            ':photo' => $location
        ]);
        if ($statement) {
            $_SESSION['success'] = 'Inmate Added Successfully';
        } else {
            $_SESSION['error'] = 'Problem Adding User';
        }
    }
}
?>

<!-- CONTENT -->
<section id="content">
    <main>
        <div class="top">
            <div class="left">
                <h1 class="title">Add Inmate</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Add Inmate</a>
                    </li>
                    <li class="arrow-icon"><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a href="view_inmates.php" class="active">BACK</a>
                    </li>
                </ul>
            </div>
        </div>

        <form class="well form-horizontal" action="" method="post" id="contact_form" enctype="multipart/form-data">
            <!-- Form Fields Here -->
            <!-- Text input-->
<div class="form">
        <h4 class="form-title">Inmate Details</h4>
        <div class="form-body">
<div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fname">
            </div>

<!-- Text input-->

<div class="form-group">
                <label for="dob">Date of birth</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>

<!-- gender radio checks -->
<div class="form-group">
                <label for="sex">Sex</label>
                <select class="form-control" id="sex" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            
<!--select inmate's nationality -->
<div class="form-group">
                <label for="nationality">Nationality</label>
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="nationality" class="form-control selectpicker" >
  <option value=" " >Please select your nationality</option>
  <option>Afghan</option>
  <option>Albanian</option>
  <option >Algerian</option>
  <option >American</option>
  <option >Andorran</option>
  <option >Angolan</option>
  <option >Anguillan</option>
  <option >Citizen of Antigua and Barbuda</option>
  <option >Argentine</option>
  <option> Armenian</option>
  <option >Australian</option>
  <option >Austrian</option>
  <option >Azerbaijani</option>
  <option >Bahamian</option>
  <option >Bahraini</option>
  <option >Bangladeshi</option>
  <option> Barbadian</option>
  <option >Belarusian</option>
  <option >Belgian</option>
  <option>Belizean</option>
  <option >Beninese</option>
  <option> Bermudian</option>
  <option >Bhutanese</option>
  <option >Bolivian</option>
  <option>Citizen of Bosnia and Herzegovina</option>
  <option>Botswanan</option>
  <option>Brazilian</option>
  <option>British</option>
  <option>British Virgin Islander</option>
  <option>Bruneian</option>
  <option>Bulgarian</option>
  <option>Burkinan</option>
  <option>Burmese</option>
  <option>Burundian</option>
  <option>Cambodian</option>
  <option>Cameroonian</option>
  <option>Canadian</option>
  <option>Cape Verdean</option>
  <option>Cayman Islander	</option>
  <option>Danish</option>
  <option>Djiboutian</option>
  <option>Dominican</option>
  <option>Citizen of the Dominican Republic</option>
  <option>Dutch	</option>
  <option> East Timorese	</option>
  <option>Ecuadorean</option>
  <option>Egyptian</option>
  <option >Faroese</option>
  <option >Fijian</option>
  <option>Filipino</option>
  <option >Gabonese</option>
  <option>Gambian</option>
  <option >Georgian</option>
  <option >Haitian</option>
  <option >Honduran</option>
  <option >Hong Konger</option>
  <option >Icelandic</option>
  <option >Indian</option>
  <option >Jamaican</option>
  <option >Japanese</option>
  <option >Kazakh</option>
  <option >Kenyan</option>
  <option >Lao</option>
  <option >Macanese</option>
  <option >Namibian</option>
  <option >Omani</option>
  <option >Pakistani</option>
  <option >Qatari</option>
  <option >Romanian</option>
  <option >Salvadorean</option>
  <option >Taiwanese</option>
  <option >Ugandan</option>
  <option >Vatican citizen	</option>
  <option >Wallisian</option>
  <option >Yemeni</option>
  <option >Zambian</option>
</select>
</div>



<!-- Text input-->
   
<div class="form-group">
                <label for="id">Identification / Passport Number</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>

<!-- Text input-->
  
<div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>

<!-- Text input-->

<div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city"> 
            </div>

<!-- Select Basic -->

<div class="form-group">
                <label for="region">Region</label>
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="region" class="form-control selectpicker" >
  <option value=" " >Please select your region</option>
  <option>Coast</option>
  <option>Rift Valley</option>
  <option >Nairobi</option> 
</select>
</div>

<!-- Text input-->

<!-- <div class="form-group">
<label class="col-md-4 control-label">Zip Code</label>  
<div class="col-md-6 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
<input name="zip" placeholder="Zip Code" class="form-control"  type="text">
</div>
</div>
</div> -->

<!--select inmate's nationality -->
<div class="form-group">
                <label for="country">Country</label>
                <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="country" class="form-control selectpicker" >
  <option value=" " >Please select your country</option>
  <option>Afghanistan</option>
  <option>Albania</option>
  <option >Algeria</option>
  <option >America</option>
  <option >Andorra</option>
  <option >Angola</option>
  <option >Anguilla</option>
  <option >Antigua and Barbuda</option>
  <option >Argentina</option>
  <option> Armenia</option>
  <option >Australia</option>
  <option >Austria</option>
  <option >Azerbaijan</option>
  <option >Bahamas</option>
  <option >Bahrain</option>
  <option >Bangladeshi</option>
  <option> Barbados</option>
  <option >Belarus</option>
  <option >Belgium</option>
  <option>Belize</option>
  <option >Benin</option>
  <option> Bermuda</option>
  <option >Bhutan</option>
  <option >Bolivia</option>
  <option>Bosnia and Herzegovina</option>
  <option>Botswan</option>
  <option>Brazil</option>
  <option>British</option>
  <option>British Virgin Island</option>
  <option>Brunei</option>
  <option>Bulgaria</option>
  <option>Burkin</option>
  <option>Burma</option>
  <option>Burundia</option>
  <option>Cambodia</option>
  <option>Cameroonia</option>
  <option>Canadia</option>
  <option>Cape Verde</option>
  <option>Cayman Island	</option>
  <option>Danish</option>
  <option>Djibouti</option>
  <option>Dominican</option>
  <option>Dominican Republic</option>
  <option>Dutch	</option>
  <option> East Timor	</option>
  <option>Ecuador</option>
  <option>Egypt</option>
  <option >Faro</option>
  <option >Fiji</option>
  <option>Filip</option>
  <option >Gabon</option>
  <option>Gambia</option>
  <option >Georgia</option>
  <option >Haitia</option>
  <option >Hondur</option>
  <option >Hong Kong</option>
  <option >Iceland</option>
  <option >India</option>
  <option >Jamaica</option>
  <option >Japan</option>
  <option >Kazakh</option>
  <option >Kenya</option>
  <option >Lao</option>
  <option >Macan</option>
  <option >Namibia</option>
  <option >Oman</option>
  <option >Pakistan</option>
  <option >Qatar</option>
  <option >Roman</option>
  <option >Salvador</option>
  <option >Taiwan</option>
  <option >Uganda</option>
  <option >Vatica</option>
  <option >Wallisia</option>
  <option >Yemeni</option>
  <option >Zambia</option>
</select>
</div>
</div>


<!-- Text input-->
   
<div class="form-group">
                <label for="tel">Contact Number</label>
                <input type="tel" class="form-control" id="tel" name="phone">
            </div>

<!-- Text input-->

<div class="form-group">
                <label for="emergencycontactname">Emergency Contact Name</label>
                <input type="text" class="form-control" id="emergencycontactname" name="e_name">
            </div>

<!-- Text input-->

<div class="form-group">
                <label for="emergencycontactrelation">Emergency Contact Relationship</label>
                <input type="text" class="form-control" id="emergencycontactrelation" name="e_relation">
            </div>

<!-- Text input-->
   
<div class="form-group">
                <label for="emergencycontactnumber">Emergency Contact Number</label>
                <input type="tel" class="form-control" id="emergencycontactnumber" name="e_no">
            </div>

<!-- Text input-->

<div class="form-group">
                <label for="doa">Date Of Admission</label>
                <input type="date" class="form-control" id="doa" name="doa">
            </div>

            <div class="form-group">
                <label for="inputState">Security Level</label>
    <select id="inputState" class="form-select" name="level">
      <option selected>Choose the security level</option>
      <option>Maximum</option>
      <option>Medium</option>
      <!-- <option>Minimum</option> -->
    </select>
  </div>
  <div class="form-group">
                <label for="inputState">Name of Prison Facility</label>
                
    <select id="inputState" class="form-select" name="facility">
      <option selected>Choose the name of prison</option>
      <!-- <option>Kamiti Maximum Prison Centre</option> -->
  <option>Nairobi Remand & Allocation Centre</option>
  <!-- <option >Naivasha Maximum Security Prison</option>
  <option >Shimo La Tewa Maximum Prison Centre</option>
  <option >Manyani Maximum Prison Centre</option>
  <option >Kamiti Medium Prison Centre</option>
  <option >Nairobi West Prison</option>
  <option >Shimo La Tewa Medium Prison Centre</option>
  <option >Kwale Prison</option>
  <option> Nakuru Main Prison</option>
  <option >Eldoret Main Prison</option>
  <option >Nairobi Short Sentence Prison</option>
  <option >Kamiti Youth Correction & Training Centre</option>
  <option >Hola Prison</option>
  <option >Malindi Prison</option>
  <option >Kitale Main Prison</option>
  <option>Kapsabet Main Prison</option> -->
    </select>
  </div>
 

 <!-- Text input-->


 <div class="form-group">
<label for="cell_no">Select a cell:</label>
        <select name="cell_no" id="cell_no" class="form-select">
        <option value=" " disabled selected >Please select a cell</option>
            <?php
            if ($result4->num_rows > 0) {
                // Output data of each row
                while($row = $result4->fetch_assoc()) {
                    echo "<option value=''>" . $row["name"] ."</option>";
                }
            } else {
                echo "<option value=''>No data available</option>";
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // Get the selected option from the dropdown
              $selected_option = $_POST['cell_no'];
          
              // Prepare and bind
              $stmt2 = $conn->prepare("INSERT INTO inmates (CellNumber) VALUES (?)");
              $stmt2->bind_param("s", $selected_option);
            }
            ?>
        </select>            </div>

  <!-- Text input-->

  <div class="form-group">
                <label for="s_date">Sentence Start Date</label>
                <input type="date" class="form-control" id="ssd" name="s_date">
            </div>

  <!-- Text input-->

  <div class="form-group">
                <label for="e_date">Sentence End Date</label>
                <input type="date" class="form-control" id="sed" name="e_date">
            </div>

<!--select inmate's offense -->
<div class="form-group">
                <label for="offence">Inmate's Offence</label>
<div class="input-group">
        <select name="offence" id="offence">
        <option value=" " disabled selected >Please select the Inmate's Offence</option>
            <?php
            if ($result5->num_rows > 0) {
                // Output data of each row
                while($row = $result5->fetch_assoc()) {
                    echo "<option value=''>" . $row["Name"] ."</option>";
                }
            } else {
                echo "<option value=''>No data available</option>";
            }
            ?>
        </select>  
</div>
</div>

<!-- Text input-->
<div class="form-group">
                <label for="medicalConditions">Medical Condition</label>
                <input type="text" class="form-control" id="medicalConditions" name="conditions">
            </div>



<!-- Text area -->

<div class="form-group">
                <label for="recommended_medication">Medication</label>
                <input type="text" class="form-control" id="recommended_medication" name="med">
            </div>


<!-- Text area -->

<div class="form-group">
                <label for="comment">Remarks</label>
                <input type="text" class="form-control" id="comment" name="remarks">
            </div>


<div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <p class="text-center">
                        <input type="file" name="avatar" id="avatar" required class="form-control form-control-sm rounded-0" accept="image/png,image/jpeg,image/jpg" onChange="display_img(this)">
                       </p>

                    <p class="text-center">
                   <img src="<?php echo $admin_photo; ?>" alt="user image" width="178" height="154" id="logo-img">
				    </p>
              </div>
            <div class="form-group" style="padding: 0.25rem 1rem; text-align: center;">
                <button type="submit" class="btn btn-warning" name="btncreate">Save <span class="glyphicon glyphicon-send"></span></button>
                <a class="btn " href="./?page=view_inmates"><i class="fa "></i> Cancel</a>
            </div>
        </form>

        <link rel="stylesheet" href="popup_style.css">
        <?php if(!empty($_SESSION['success'])) {  ?>
        <div class="popup popup--icon -success js_success-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    <strong>Success</strong>
                </h1>
                <p><?php echo $_SESSION['success']; ?></p>
                <p>
                    <button class="button button--success" data-for="js_success-popup">Close</button>
                </p>
            </div>
        </div>
        <?php unset($_SESSION["success"]); } ?>
        <?php if(!empty($_SESSION['error'])) {  ?>
        <div class="popup popup--icon -error js_error-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    <strong>Error</strong>
                </h1>
                <p><?php echo $_SESSION['error']; ?></p>
                <p>
                    <button class="button button--error" data-for="js_error-popup">Close</button>
                </p>
            </div>
        </div>
        <?php unset($_SESSION["error"]); } ?>
    </main>
</section>

<script>
    var addButtonTrigger = function (el) {
        el.addEventListener('click', function () {
            var popupEl = document.querySelector('.' + el.dataset.for);
            popupEl.classList.toggle('popup--visible');
        });
    };

    Array.from(document.querySelectorAll('button[data-for]')).
    forEach(addButtonTrigger);
</script>
