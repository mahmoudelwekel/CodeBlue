<?php include 'header.php'?>

    <div style="width:100%;" class=" container col-md-5 jumbotron my-5 ">
    <form action="process/liveform.php" method="post">
  <div class="form-group">
    <label for="staticEmail" class=" col-form-label h2">Code blue operator</label>

      <input class="form-control" id="operator" name="operator" placeholder="Code blue operator" aria-describedby="emailHelp">
  </div>
  <hr>
  <div class="form-group">
      <label for="staticEmail" class=" col-form-label h2">Is it Adult or Pediatric (Pediatric= 14 years or less)</label>
      <div class="form-check">
          <label class="form-check-label">
              <input type="radio" class="" name="age" id="age" value="1">
             Adult
          </label>
          <br>
          <label class="form-check-label">
              <input type="radio" class="" name="age" id="age" value="2">
              Pediatric
          </label>
      </div>
  </div>
  <hr>
  <div class="form-group">
      <label for="staticEmail" class=" col-form-label h2">Which Hospital?</label>
      <div class="form-check">
          <label class="form-check-label">
              <input type="radio" class="" name="hospital" id="hospital" value="1">
              Main
          </label>
          <br>
          <label class="form-check-label">
              <input type="radio" class="" name="hospital" id="hospital" value="2">
              Pediatric/Children
          </label>
          <br>
          <label class="form-check-label">
              <input type="radio" class="" name="hospital" id="hospital" value="3">
              Maternity
          </label>
          <br>
          <label class="form-check-label">
              <input type="radio" class="" name="hospital" id="hospital" value="4">
              Rehabilitation/Rehab
          </label>
          <br>
          <label class="form-check-label">
              <input type="radio" class="" name="hospital" id="hospital" value="5">
              Ambulatory/New OPD
          </label>
      </div>
  </div>
  <hr>
        <div class="form-group">
            <label for="staticEmail" class=" col-form-label h2">Which Floor</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="" name="floor" id="floor" value="1">
                    Basement
                </label>
                <br>
                <label class="form-check-label">
                    <input type="radio" class="" name="floor" id="floor" value="2">
                    Ground
                </label>
                <br>
                <label class="form-check-label">
                    <input type="radio" class="" name="floor" id="floor" value="3">
                    1st
                </label>
                <br>
                <label class="form-check-label">
                    <input type="radio" class="" name="floor" id="floor" value="4">
                    2nd
                </label>
                <br>
                <label class="form-check-label">
                    <input type="radio" class="" name="floor" id="floor" value="5">
                    3rd
                </label>
                <br>
                <label class="form-check-label">
                    <input type="radio" class="" name="floor" id="floor" value="6">
                    4th
                </label>
                <br>
                <label class="form-check-label">
                    <input type="radio" class="" name="floor" id="floor" value="7">
                    5th
                </label>
                <br>
                <label class="form-check-label">
                    <input type="radio" class="" name="floor" id="floor" value="8">
                    6th
                </label>
                <br>
                <label class="form-check-label">
                    <input type="radio" class="" name="floor" id="floor" value="9">
                    7th
                </label>

            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="staticEmail" class=" col-form-label h2">Where?</label>
            <input class="form-control " id="place" name="place" placeholder="Where? (Ward/Unit/clinic/Office/Other)" aria-describedby="emailHelp">
        </div>
        <hr>
        <div class="form-group">
            <label for="staticEmail" class=" col-form-label h2">Location code</label>

            <select class="form-control custom-select" id="cbno" name="cbno">
                <?php
                include "dbinfo.php";
                $cn1 = mysqli_connect(Host, UN, PW, DBname);
                $qry1 = mysqli_query($cn1 , "select * from code_blue_locations");
                while ($arr1=mysqli_fetch_array($qry1)) {
                    $cbid = $arr1[0];
                    $cbtxt = $arr1[1];
                    ?>
                    <option value="<?php echo $cbid?>"><?php echo $cbtxt?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <hr>
        <div class="form-group">
            <label for="staticEmail" class=" col-form-label h2">FeedBack</label>

            <input class="form-control" id="feed" name="feed" placeholder="Feedback" type="text" >
        </div>
        <hr>
        <div class="form-group">
            <label for="staticEmail" class=" col-form-label h2">To</label>

            <input class="form-control" id="mail" name="mail" value="mmabubay@kfmc.med.sa"  placeholder="To" type="email" >
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="e1" name="e1">
            <label class="form-check-label" for="exampleCheck1">Fahad A. AlSelham</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="e2" name="e2">
            <label class="form-check-label" for="exampleCheck1">Juhaym M.AlOnezi</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="e3" name="e3">
            <label class="form-check-label" for="exampleCheck1">Ali Mohammed Ali Faqihi</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="e4" name="e4">
            <label class="form-check-label" for="exampleCheck1">Nichelle D. Mella</label>
        </div>
        <hr>
        <div style="width:100%;" class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary ">Save & send</button>
  </form>
  </div>

 <?php include 'footer.php'?>
