<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commerce website</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font  awesome  link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow-x: hidden;
        }
        button{
            border-radius: 12px;
        }
    </style>
</head>

<body>
<form method="post" action="" enctype="multipart/form-data" class="bg-info border border-primary rounded p-3 animated-border">
  <div class="bg-info form-group">
    <label for="name">Name:</label>
    <input type="text" class="bg-info form-control" id="name" name="name" required>
  </div>
  <div class="bg-info form-group">
    <label for="email">Email:</label>
    <input type="email" class="bg-info form-control" id="email" name="email" required>
  </div>
  <div class="bg-info form-group">
    <label for="location">Location:</label>
    <select id="location" name="location" required class="bg-info form-select">
      <option>--Select location--</option>
      <option value="Addis Ababa">Addis Ababa</option>
      <option value="bahir dar">bahir dar</option>
      <option value="jimma">jimma</option>
      <option value="hawasa">hawasa</option>
      <option value="adama">adama</option>
      <option value="mekelle">mekelle</option>
    </select>
  </div>
  <div class="bg-info form-group">
    <label for="phone">Phone:</label>
    <input type="tel" class="bg-info form-control" id="phone" name="phone" required>
  </div>
  <div class="bg-info form-group">
    <label for="password">Password:</label>
    <input type="password" class="bg-info form-control" id="password" name="password" required>
  </div>
  <div class="bg-info form-group">
    <label for="description">Description:</label>
    <textarea class="bg-info form-control" id="description" name="description" rows="3" required></textarea>
  </div>
  <div class="bg-info form-group">
    <label for="subject">Subject:</label>
    <input type="text" class="bg-info form-control" id="subject" name="subject" required>
  </div>
  <div class="bg-info form-group">
    <label for="level">Level of Grade:</label>
    <select class="bg-info form-select" id="level" name="level" required>
      <option value="">--Select--</option>
      <option value="Elementary">Elementary</option>
      <option value="Middle School">Middle School</option>
      <option value="High School">High School</option>
    </select>
  </div>
  <div class="bg-info form-group">
    <label for="budget">Budget:</label>
    <div class="bg-info input-group">
      <div class="bg-info input-group-prepend">
        <span class="bg-info input-group-text">$</span>
      </div>
      <input type="number" class="bg-info form-control" id="budget" name="budget" required>
    </div>
  </div>
  <div class="bg-info form-group">
    <label for="gender">Gender:</label><br>
    <div class="bg-info form-check form-check-inline">
      <input class="bg-info form-check-input" type="radio" name="gender" id="gender-female" value="female" required>
      <label class="bg-info form-check-label" for="gender-female">Female</label>
    </div>
    <div class="bg-info form-check form-check-inline">
      <input class="bg-info form-check-input" type="radio" name="gender" id="gender-male" value="male" required>
      <label class="bg-info form-check-label" for="gender-male">Male</label>
    </div>
  </div>
  <div class="bg-info form-group">
    <label for="file">File upload:</label>
    <input type="file" class="bg-info form-control-file" id="file" name="file">
  </div>
  <button type="submit" name="submit" class="bg-info btn btn-primary">Submit</button>
</form>
      </body>
      </html>