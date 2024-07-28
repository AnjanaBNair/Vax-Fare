from selenium import webdriver
import time
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import easygui

# Open the Chrome browser
driver = webdriver.Chrome()

# Navigate to the login page
driver.get("http://localhost:8080/miniproject/log1.php")

# Fill in the login form
username_input = WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.NAME, "name")))
username_input.send_keys("abhinavbnair12@gmail.com")

password_input = WebDriverWait(driver, 20).until(EC.presence_of_element_located((By.NAME, "pass1")))
password_input.send_keys("abhinav@123")

# Click the login button
login_button = WebDriverWait(driver, 20).until(EC.element_to_be_clickable((By.NAME, "sub")))
login_button.click()

# Wait for the page to load and verify that the login was successful
WebDriverWait(driver, 20).until(EC.title_contains("VAX-FARE"))

# Check if user is logged in successfully
if driver.current_url == "http://localhost:8080/miniproject/demo.php":
    driver.get("http://localhost:8080/miniproject/UpdatePassword.php")
    # Fill in the password update form
    fname_field = WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.NAME, "pass3")))
    fname_field.send_keys("abhinav@123")

    lname_field = WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.NAME, "pass2")))
    lname_field.send_keys("abhinav@123")

    username_input = WebDriverWait(driver, 10).until(EC.presence_of_element_located((By.NAME, "pass1")))
    username_input.send_keys("abhinav@123")

    # Click the register button
    reg_button = WebDriverWait(driver, 20).until(EC.element_to_be_clickable((By.NAME, "submit")))
    reg_button.click()

    # Wait for the page to load and verify that the registration was successful
    WebDriverWait(driver, 20).until(EC.title_contains("VAX-FARE"))

    # Check if registration was successful
    if driver.current_url == "http://localhost:8080/miniproject/demo1.php":
        easygui.msgbox("Password Updation test Successful!!!")
    else:
            easygui.msgbox("Password Updation test Failed!!!")
    
else:
    easygui.msgbox("Login test Failed...!!!")

# Close the browser
driver.quit()
