<?php
# make some user info stuff here
# logout button needs to be added
if(!isset($_SESSION['username']))
{
  header('Location: ' . URL . 'login');
}

  $userEnc = json_encode($data, true);
  $userDec = json_decode($userEnc, true);
?>
<div class="container-fluid">

  <form class="" action="<?php echo URL ; ?>home/updateUserInfo" method="post">
    <div class="input-group">
      <span class="input-group-addon">Username</span>
      <input type="text" name = 'username' class="form-control" placeholder="<?php echo $userDec[0]['Username']; ?>">
      <span class ="input-group-btn">
        <button type='submit' class = 'btn btn-warning'>Update</button>
      <span>
    </div>
  </form>
  <form class ="" action="<?php echo URL ; ?>home/updateUserInfo" method="post">
    <div class="input-group">
      <span class="input-group-addon">Change password</span>
      <input type="password" name ='password' class="form-control" placeholder="Password">
      <span class ="input-group-btn">
        <button type='submit' class ='btn btn-warning'>Update</button>
      <span>
    </div>
  </form>
  <form class = "" action ="<?php echo URL ; ?>home/updateUserInfo" method="post">
    <div class="input-group">
      <span class="input-group-addon">Change email</span>
      <input type="text" name = 'email' class="form-control" placeholder="<?php echo $userDec[0]['Email']; ?>">
      <span class ="input-group-btn">
        <button type='submit' class ='btn btn-warning'>Update</button>
      <span>
    </div>
  </form>
</div>
<hr>
<div class="container-fluid">
  <form class = "" action ="<?php echo URL ; ?>home/updateUserInfo" method="post">
    <input class="btn btn-danger" type="submit" name="makeAdmin" value="Make me admin">
  </form>
</div>
