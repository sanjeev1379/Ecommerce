
function formValidation()
 {
  var uid = document.registration.first_name;
  var uzip = document.registration.mobile_no;
  var uemail = document.registration.email;
  var birthday = document.registration.birthday;
  var uadd = document.registration.address;
  var passid = document.registration.password;
  var passid_again = document.registration.password_again;

     if(userid_validation(uid))
          {
            if(allnumeric(uzip))
              {
                if(ValidateEmail(uemail))
                  {
                    if(birthday_validation(birthday))
                      {
                        if(alphanumeric(uadd))
                          {
                            if(passid_validation(passid,1,12))
                              {
                                if(passid_again_validation(passid_again,1,12))
                                  {

                                  }
                              }
                          }
                      }
                  }
              }
          }
      return false;

  }
      function userid_validation(uid)
          {
            var uid_len = uid.value.length;
              if (uid_len == 0)
                {
                  alert("First Name should not be empty ");
                  uid.focus();
                  return false;
                }
            return true;
          }

      function allnumeric(uzip)
          {
            var numbers = /^[0-9]+$/;
            if(uzip.value.match(numbers))
              {
                return true;
              }
              else
                {
                  alert('Mobile no must have numeric only');
                  uzip.focus();
                  return false;
                }
              }

              function ValidateEmail(uemail)
              {
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(uemail.value.match(mailformat))
                  {
                    return true;
                  }
                  else
                    {
                      alert("You have entered an invalid email address!");
                      uemail.focus();
                      return false;
                    }
                  }

                  function birthday_validation(birthday)
                  {
                    var birthday_len = birthday.value.length;
                    if (birthday_len == 0)
                      {
                        alert(" Please choose a valid Birthday ");
                        birthday.focus();
                        return false;
                      }
                      return true;
                    }

                    function alphanumeric(uadd)
                    {
                      var letters = /^[0-9a-zA-Z]+$/;
                      if(uadd.value.match(letters))
                        {
                          return true;
                        }
                        else
                          {
                            alert('User address must have alphanumeric characters only');
                            uadd.focus();
                            return false;
                          }
                        }

                        function passid_validation(passid,mx,my)
                        {
                          var passid_len = passid.value.length;
                          if (passid_len == 0 ||passid_len >= my || passid_len < mx)
                            {
                              alert("Password should not be empty / length be between "+mx+" to "+my);
                              passid.focus();
                              return false;
                            }
                            return true;
                          }

                          function passid_again_validation(passid_again,mx,my)
                          {
                            var passid_len = passid_again.value.length;
                            if (passid_len == 0 ||passid_len >= my || passid_len < mx)
                              {
                                alert("Password should not be empty / length be between "+mx+" to "+my);
                                passid_again.focus();
                                return false;
                              }else
                                {
                                  alert('Your are Succesfully Register Please Login!');
                                   return true;
                                }

                            }
                          /*  else
                              {
                                alert('Form Succesfully Submitted');
                                window.open("register.php");
                                return true;
                              }
                            }*/
