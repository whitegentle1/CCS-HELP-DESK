const registerButton = document.getElementById('register')
const loginButton = document.getElementById('login')
const container = document.getElementById('container')

registerButton.addEventListener('click', () => {
  container.classList.add('right-panel-active')
})

loginButton.addEventListener('click', () => {
  container.classList.remove('right-panel-active')
})

document.getElementById('get-started').addEventListener('click', function () {
  document.getElementById('popup_body').style.display = 'flex'
})

document.getElementById('forgot-pass1').addEventListener('click', function () {
  document.getElementById('fbody').style.display = 'flex'
  document.getElementById('forgot-pass').style.display = 'flex'
})

document.querySelector('.close3').addEventListener('click', function () {
  document.getElementById('forgot-pass').style.display = 'none'
  document.getElementById('fbody').style.display = 'none'
})
document.querySelector('.close1').addEventListener('click', function () {
  document.getElementById('popup_body').style.display = 'none'
})
document.querySelector('.close').addEventListener('click', function () {
  document.getElementById('popup_body').style.display = 'none'
})

//dark mode function-------------------------------------------------------------------
let canToggle = true
const toggle = document.getElementById('toggleDark')
const body = document.querySelector('body')

const isDarkMode = localStorage.getItem('darkMode') === 'enabled'
//function to remember dark mode
if (isDarkMode) {
  body.classList.add('darkmode')
  body.style.backgroundImage = 'url("imgs/BG_DHVSU_DARKMODE.jpg")'
  toggle.classList.remove('bi-moon-fill')
  toggle.classList.add('bi-brightness-high-fill')
}

toggle.addEventListener('click', function () {
  if (!canToggle) {
    return
  }

  if (this.classList.contains('bi-moon-fill')) {
    this.classList.remove('bi-moon-fill')
    this.classList.add('bi-brightness-high-fill')

    body.style.transition = 'background-image 0.5s ease'
    body.style.backgroundImage = 'url("imgs/BG_DHVSU_DARKMODE.jpg")'
    document.body.classList.add('darkmode')
    localStorage.setItem('darkMode', 'enabled')

    canToggle = false
    setTimeout(() => {
      canToggle = true
    }, 1000)
  } else {
    this.classList.remove('bi-brightness-high-fill')
    this.classList.add('bi-moon-fill')

    body.style.transition = 'background-image 0.5s ease'
    body.style.backgroundImage = 'url("imgs/RegisterBG.jpg")'
    document.body.classList.remove('darkmode')
    localStorage.removeItem('darkMode')

    canToggle = false
    setTimeout(() => {
      canToggle = true
    }, 1000)
  }
})

//registration error handling function-------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
  document
    .getElementById('registrationForm')
    .addEventListener('submit', function (event) {
      event.preventDefault()

      var course = document.getElementById('course').value
      var fname = document.getElementById('firstname').value
      var lname = document.getElementById('lastname').value
      var email = document.getElementById('email').value
      var password = document.getElementById('npassword').value
      var confirmPassword = document.getElementById('conpassword').value
      var agreeCheckbox = document.getElementById('checkmark12')
      var emailPattern = /^[0-9]{10}@dhvsu\.edu\.ph$/

      var modalMessage = document.getElementById('popup-message')
      var modal = document.getElementById('popup12')

      if (fname == '' || lname == '' || email == '' || password == '') {
        modalMessage.innerText = 'Please fill the empty form/s.'
      } else if (!emailPattern.test(email)) {
        modalMessage.innerText =
          'Please use your DHVSU account (ex. 2000123456@dhvsu.edu.ph).'
      } else if (!agreeCheckbox.checked) {
        modalMessage.innerText =
          'You must agree to the terms and conditions, and data privacy policy.'
      } else if (password.length < 8) {
        modalMessage.innerText = 'Password must be at least 8 characters long.'
      } else if (password != confirmPassword) {
        modalMessage.innerText = 'Passwords do not match.'
      } else if (course === 'Course') {
        modalMessage.innerText = 'Please select a course.'
      } else {
        var xhr = new XMLHttpRequest()
        xhr.open('POST', 'process/check-email.php', true)
        xhr.setRequestHeader(
          'Content-type',
          'application/x-www-form-urlencoded'
        )
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText
            if (response === 'exists') {
              modalMessage.innerText = 'Email already exists'
            } else if (response === 'ok') {
              modalMessage.innerText = 'Registration successful!'
              document.getElementById('registrationForm').submit()
            }
            modal.style.display = 'flex'
          }
        }
        xhr.send('email=' + email)
      }

      modal.style.display = 'flex'
    })

  document.querySelector('.popupclose').addEventListener('click', function () {
    document.getElementById('popup12').style.display = 'none'
  })

  window.addEventListener('click', function (event) {
    if (event.target == document.getElementById('popup12')) {
      document.getElementById('popup12').style.display = 'none'
    }
  })
  document
    .querySelector('a[href="#terms"]')
    .addEventListener('click', function (event) {
      event.preventDefault()
      showTermsAndConditions()
    })

  function showTermsAndConditions () {
    var termsContent = `
    Don Honorio Ventura State University CCS Help Desk Terms and Conditions
    1. Scope and Services
    The DHVSU online support system is designed to provide assistance and guidance to students in various university-related matters. This service employs a combination of reliable chatbot technology and university-approved officials to respond to student inquiries.
    2. Services Description
    •	The CCS Help Desk support system assists in answering general queries related to admissions, academic programs, course schedules, administrative procedures, campus facilities, and other university-related information.
    •	Students may request official documents such as Certificates of Registration (COR), transcripts, and other relevant paperwork through this system. Notably, certain documents might involve fees, the details of which will be clearly outlined during the request process.
    3. Usage and Acceptance
    •	By utilizing the DHVSU online support services, users implicitly agree to comply with the university's regulations, policies, and guidelines.
    •	Users are solely responsible for the accuracy and legitimacy of the information they provide and must refrain from unauthorized access or misuse of the platform.
    4. Payments and Document Requests
    •	In the event of document requests that incur fees, the service will specify the associated costs and the payment process during the request submission. Users are accountable for the prompt payment of any applicable fees in accordance with the university’s accepted payment methods.
    •	The university ensures that payments are processed securely and are directed through verified payment channels.
    5. Privacy and Data Usage
    •	DHVSU prioritizes user privacy and handles personal information in compliance with relevant data protection regulations. Users are encouraged to refer to the Privacy Policy for comprehensive details on data collection, utilization, storage, and their rights concerning their personal data.
    6. Intellectual Property
    •	All content provided through the DHVSU online support system, including text, graphics, images, and the DHVSU logo, is the property of the university and is safeguarded by copyright and intellectual property laws. Any reproduction or distribution without authorization is strictly prohibited.
    7. Limitation of Liability
    •	DHVSU will not be held liable for any inaccuracies, errors, or omissions in the information provided via the online support system. Users are strongly advised to verify critical information through official university channels.
    8. Governing Law
    •	These terms and conditions are governed by the laws of [insert jurisdiction/country]. Any disputes arising from the utilization of this service shall be resolved within the said jurisdiction.
    9. Prohibited Activities
    •	Users are strictly prohibited from engaging in any unlawful, abusive, disruptive, or fraudulent behavior while using the DHVSU online support system. Violation of these terms may result in the suspension or termination of access to the service.
    10. Amendments and Updates
    •	DHVSU reserves the right to revise, update, or modify these terms and conditions when deemed necessary. Users will be duly informed of any changes, and their continued use of the service will imply their acceptance of the updated terms.
  `
    showModal(termsContent)
  }

  // Function to show data privacy policy
  function showDataPrivacyPolicy () {
    var privacyContent = `
    Don Honorio Ventura State University Data Privacy Policy
    1. Introduction
    At Don Honorio Ventura State University (DHVSU), we are dedicated to respecting and protecting the privacy of personal information gathered through our online support system. This Data Privacy Policy outlines how we collect, use, store, and protect your data in compliance with the Philippine Data Privacy Act.
    2. Information Collection
    •	Types of Data Collected: When utilizing the DHVSU online support system, we may collect various forms of personal information, including names, contact details, student identification numbers, and other pertinent data necessary to address queries or process document requests.
    •	Methods of Collection: Your information is gathered when provided voluntarily during interactions with our chatbot or university officials or when initiating document requests.
    3. Usage of Collected Information
    •	Purpose of Data Collection: The personal information collected is utilized to improve and optimize the services provided. This data assists in responding to inquiries, processing document requests, and ensuring the delivery of accurate and relevant information to our users.
    •	Limitation of Usage: DHVSU ensures that the collected data is used exclusively for the stated purposes and is not shared with third parties without explicit consent, except as required by law.
    4. Data Protection and Security
    •	Data Security Measures: DHVSU employs stringent security measures to protect user data from unauthorized access, alteration, disclosure, or destruction.
    •	Access Restriction: Access to user data is restricted to authorized personnel bound by confidentiality obligations. Access is granted only for legitimate and necessary purposes.
    5. User Rights and Control
    •	Access and Correction: Users have the right to access the personal information stored in our system and can request corrections or updates to any inaccurate or outdated data.
    •	Opt-out Option: Users have the right to opt-out of specific data collection practices; however, this might limit their access to certain services provided by DHVSU.
    6. Data Retention
    •	Retention Period: DHVSU retains user data for the duration necessary to fulfill the intended purposes for which it was collected, unless a longer retention period is required or permitted by law.
    7. Compliance with Philippine Data Privacy Laws
    •	Adherence to Laws: DHVSU is committed to strictly adhering to the provisions of the Philippine Data Privacy Act (Republic Act No. 10173) and all other applicable laws concerning the protection of personal information.
    8. Changes to the Privacy Policy
    •	Updates and Notification: Any alterations or updates to this Data Privacy Policy will be communicated through the DHVSU website. Users will be informed of significant changes in the policy.
    9. Contact Information
    •	For Inquiries: If you have any questions or concerns regarding this Data Privacy Policy or the handling of your personal information, please reach out to DHVSU at ccshelpdesk@dhvsu.edu.ph.    
  `
    showModal(privacyContent)
  }

  // Function to display the popup with the content
  function showModal (content) {
    var modalMessage = document.getElementById('popup-message')
    var modal = document.getElementById('popup12')
    modalMessage.innerText = content
    modal.style.display = 'flex'
  }

  // Event listeners for terms and privacy policy links
  document
    .querySelector('a[href="#terms"]')
    .addEventListener('click', function (event) {
      event.preventDefault()
      showTermsAndConditions()
    })

  document
    .querySelector('a[href="#privacy"]')
    .addEventListener('click', function (event) {
      event.preventDefault()
      showDataPrivacyPolicy()
    })
})
//login error handling function with animation----------------------------------------------------------------
function loginUser (form) {
  var email = form.email.value
  var password = form.password.value
  var errorDiv = document.getElementById('error-messages')
  var loginContainer = document.querySelector('.popup_body')
  var pageContainer = document.querySelector('.page-container')

  var xhr = new XMLHttpRequest()
  xhr.open('POST', 'process/login.php', true)
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = xhr.responseText
      if (response === 'success') {
        errorDiv.style.color = 'green'
        errorDiv.innerHTML = 'Login successful. Redirecting...'
        errorDiv.style.display = 'block'
        setTimeout(function () {
          loginContainer.style.visibility = 'hidden'
          loginContainer.style.opacity = '0'
          loginContainer.style.transition =
            'visibility 0s 0.5s, opacity 0.5s linear'
        }, 1000)

        pageContainer.addEventListener(
          'animationend',
          function () {
            window.location.href = 'Home'
          },
          { once: true }
        )
        setTimeout(function () {
          pageContainer.style.animation = 'slide-left 1s forwards'
        }, 1000)
      } else {
        errorDiv.style.color = 'red'
        errorDiv.innerHTML = response
        errorDiv.style.display = 'block'
      }
    }
  }

  xhr.send('email=' + email + '&password=' + password)
  return false
}
