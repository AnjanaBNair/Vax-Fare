<!-- Button to open the modal -->
<head>
<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-top: 10px;
  margin-bottom: 5px;
}

input {
  padding: 10px;
  border: none;
  border-radius: 5px;
  margin-bottom: 15px;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

@media screen and (max-width: 700px) {
  .modal-content {
    width: 90%;
  }
}

</style>
</head>
<button id="openModal">Update Profile</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Update Profile Information</h2>
    <form>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="mobile">Mobile Number:</label>
      <input type="tel" id="mobile" name="mobile" required>

      <button type="submit">Save Changes</button>
    </form>
  </div>

</div>
