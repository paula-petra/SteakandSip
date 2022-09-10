
var empty = false;
var password = "",chk_password = "", value_empty = false;
var table = "";
var login_password = "";
var chk_box = "";
var label = '';
var regs = '';
var xhr = new XMLHttpRequest();

var form = new FormData();
var message = "";

$(".submit").on("click", function(e)
{
	

	e.preventDefault();
	$(this).html("please wait....");
	empty = false;
	var confirm_submit = true;
	if($(this).attr("prompt") !== undefined)
	{
		if($(this).attr("sweetalert") !== undefined)
		{
			confirm_submit = hrm_prompt($(this).attr("prompt"));
			
		}
		
		else
		{
			confirm_submit = confirm($(this).attr("prompt"));
		}
		

	}
	

	
	if(confirm_submit)
	{

		if($(this).attr("special-form") !== undefined)
		{
			var s_class = $(this).attr("s_class");
			
			s_validate(s_class);
		}
		else
		{
			validate();
		}
		if(!empty)
		{
			$(this).append("<i class=\"fa fa-spinner fa-spin loader\" style=\"font-size:24px\"></i>");

			if($(this).attr("special-form") !== undefined)
			{
			
				var myform = special_form(s_class);

				if($(this).attr("edit") !== undefined)
				{
					myform.append("edit","true");
					myform.append("id",$(this).attr("edit"));
				}

				xhr.addEventListener("load",function(e)
				{
					
					////hr.responseText);
					$(".loader").remove();
					//document.getElementById("click").click();				

			


					if($(this).attr("new") === undefined)
					{
						
						
						$(".modal-body").html(xhr.responseText);
						
						if(xhr.responseText.trim() =="VALUE INSERTED")
						{
							$(s_class).each(function(e)
							{
									if($(this).attr("type") !== "hidden")
									{
										$(this).val("");
									}
							});							
							//  location.reload();
							alert("VALUE INSERTED");
						
							
	
						}
						if(xhr.responseText.trim() == "UPDATE WAS SUCCESSFUL")
						{			
								$(s_class).each(function(e)
								{
										if($(this).attr("type") !== "hidden")
										{
												$(this).val("");
										}
								});							
							alert("UPDATE WAS SUCCESSFUL");
						}
					}
					else
					{
								
						//alert("images/thumbs-up.png","Success",xhr.responseText + "<p><a class=\"success \" style=\"margin: 20px; font-size: 1.3em;\" href=\""+link+"> Next</a></p>");
						$(".modal-body").html(xhr.responseText + "<p><a class=\"success \" style=\"margin: 20px; font-size: 1.3em;\" href=\""+link+"> Next</a></p>");
					}
					
					
				});
				
				if($(this).attr("data-ajax") !== undefined)
				{
					xhr.open("post",$(this).attr("data-ajax"),true);
				}
					
				else
				{
					xhr.open("post",$(this).attr("data-ajax"),true);
					xhr.send(myform);
				}	
						


				
			}
			else
			{

				// profile update
				if($(this).attr("edit") !== undefined)
				{
					
					xhr.addEventListener("load",function(e)
					{
					
					
						$(".loader").remove();
								


						if($(this).attr("new") !== undefined)
						{
						    
						    

							
                            
							if(xhr.responseText.trim() === "success")
							{
							    
								$(".input").each(function(e)
								{
									if($(this).attr("type") !== "hidden")
									{
										$(this).val("");
									}
								});							
								swal({
                                  title: "success",
                                  text: "Details Updated",
                                  icon: "success",
                                  showCloseButton: true
                                  
                                });
                        //         if($(".submit").attr("data-name") == "btn")
                        // 		{
                        // 			var msg = $(this).val();
                        // 			console.log(msg);
                        // 			$(".submit").html(msg);
                        // 		}
                        		 msg = $(".submit").attr("btn");
                                 $(".submit").html(msg);
							}
							else
							{
								swal({
                                      title: "error",
                                      text: xhr.responseText,
                                      icon: "error",
                                      showCloseButton: true
                                    
                                    });
								msg = $(".submit").attr("btn");
                                $(".submit").html(msg);
							}
						}
						else
						{
                            
							$(".modal-body").html(xhr.responseText);
							// hrm_alert(xhr.responseText)
							if($(this).attr("sweetalert") !== undefined)
							{
								hrm_alert(xhr.responseText);
							}
								
                            
							if(xhr.responseText.trim() == "success")
							{
							    
									if($(this).attr("success-text") !== undefined)
									{
										$(".modal-body").html($(this).attr("success-text"));
									}

								    swal({
                                      title: "success",
                                      text: "Details Updated",
                                      icon: "success",
                                      showCloseButton: true
                                      
                                    });			
									
                                msg = $(".submit").attr("btn");
                                $(".submit").html(msg);						
							    
							}
							else
							{
								
								swal({
                                  title: "Error",
                                  text: xhr.responseText,
                                  icon: "error",
                                  showCloseButton: true
                                });
                                msg = $(".submit").attr("btn");
                                $(".submit").html(msg);
							}
							

								
								
						}
						
						
						});
						if($(this).attr("data-ajax") !== undefined)
						{
							xhr.open("post",$(this).attr("data-ajax"),true);
							xhr.send(form);
						}

						else
						{
							xhr.open("post",$(this).attr("data-ajax"),true);
							xhr.send(form);	
						}	
				}

				// password update
				if($(this).attr("change") !== undefined)
				{
					
				
					xhr.addEventListener("load",function(e)
					{
					
						if($(this).attr("new") !== undefined)
						{

							if(xhr.responseText.trim() == "success")
							{
								$(".input").each(function(e)
								{
									if($(this).attr("type") !== "hidden")
									{
										$(this).val("");
									}
								});							
							
							   msg = $(".submit").attr("btn");
                              $(".submit").html(msg);
							}
							else
							{
								
								swal({
                                  title: "Error",
                                  text: xhr.responseText,
                                  icon: "error",
                                  
                                });
                                msg = $(".submit").attr("btn");
                                $(".submit").html(msg);
							}
						}
						else
						{

						

							
							if(xhr.responseText.trim() == "success")
							{
									

								$(".input").each(function(e)
								{
									if($(this).attr("type") !== "hidden")
									{
										$(this).val("");
									}
								});							
								swal({
                                  title: "success",
                                  text: "Password updated",
                                  icon: "success",
                                  showCloseButton: true
                                  
                                });		
                               msg = $(".submit").attr("btn");
                               $(".submit").html(msg);
							}
							else
							{
							// 	alert(xhr.responseText);
								swal({
                                  title: "Error",
                                  text: xhr.responseText,
                                  icon: "error",
                                  showCloseButton: true
                                  
                                });
                               msg = $(".submit").attr("btn");
                               $(".submit").html(msg);
							}

								
								
						}
						
						
					});
					if($(this).attr("data-ajax") !== undefined)
					{
						xhr.open("post",$(this).attr("data-ajax"),true);
						xhr.send(form);
					}

					else
					{
						xhr.open("post","../controllers/change_pwd.php",true);
						xhr.send(form);	
					}	
				}

				if($(this).attr("add") !== undefined)
                {

                        
						xhr.addEventListener("load",function(e)
						{
							
							
							$(".loader").remove();
											

                            
							if($(this).attr("new") !== undefined)
							{

								
								if(xhr.responseText.trim() === "success")
								{
								    
									$(".input").each(function(e)
									{
										if($(this).attr("type") !== "hidden")
										{
											$(this).val("");
										}
									});							
									
							        swal({
                                      title: "success",
                                      text: "New Record Added",
                                      icon: "success",
                                      showCloseButton: true
                                    
                                    });
                                     msg = $(".submit").attr("btn");
                                     $(".submit").html(msg);

								}
								
								else
								{
									
									swal({
                                      title: "Error",
                                      text: xhr.responseText,
                                      icon: "error",
                                      showCloseButton: true
                                    
                                    });
                                  msg = $(".submit").attr("btn");
                                  $(".submit").html(msg);
			
								}
							}
							else
							{

                               
								$(".modal-body").html(xhr.responseText);
							
								if($(this).attr("sweetalert") !== undefined)
								{
									hrm_alert(xhr.responseText)
								}
									

								if(xhr.responseText.trim() ===  "success")
								{
									if($(this).attr("success-text") !== undefined)
									{
										$(".modal-body").html($(this).attr("success-text"));
									}
									$(".input").each(function(e)
									{
										if($(this).attr("type") !== "hidden")
										{
												$(this).val("");
										}
									});							
									
									swal({
                                      title: "success",
                                      text: "New Record Added",
                                      icon: "success",
                                      showCloseButton: true
                                    
                                    });
                                    msg = $(".submit").attr("btn");
                                    $(".submit").html(msg);

								}
								else
								{
									
									swal({
                                      title: "Error",
                                      text: xhr.responseText,
                                      icon: "error",
                                      showCloseButton: true
                                    
                                    });
                                    msg = $(".submit").attr("btn");
                                    $(".submit").html(msg);
			
								}
							
									
									
							}
							
							
						});
					
						if($(this).attr("data-ajax") !== undefined)
						{
							xhr.open("post",$(this).attr("data-ajax"),true);
							xhr.send(form);
						}

						else
						{
							xhr.open("post",$(this).attr("data-ajax"),true);
							xhr.send(form);	
						}	
							
				}
				
				if($(this).attr("upload") !== undefined)
                {

						xhr.addEventListener("load",function(e)
						{
							
							
							$(".loader").remove();
											



						$(".modal-body").html(xhr.responseText);
						// hrm_alert(xhr.responseText)
						if($(this).attr("sweetalert") !== undefined)
						{
							hrm_alert(xhr.responseText)
						}
							

						if(xhr.responseText.trim() ===  "success")
						{
							if($(this).attr("success-text") !== undefined)
							{
								$(".modal-body").html($(this).attr("success-text"));
							}
							$(".input").each(function(e)
							{
								if($(this).attr("type") !== "hidden")
								{
									$(this).val("");
								}
							});							
							swal({
                              title: "success",
                              text: "Protocol submitted",
                              icon: "success",
                              showCloseButton: true
                            
                            });
	
							   msg = $(".submit").attr("btn");
                                $(".submit").html(msg);		

						}
						else{
						    swal({
                              title: "error",
                              text: xhr.responseText,
                              icon: "error",
                              showCloseButton: true
                            
                            });
	
							msg = $(".submit").attr("btn");
                            $(".submit").html(msg);
						}
					
							
									
							
							
							
						});
						if($(this).attr("data-ajax") !== undefined)
						{
							xhr.open("post",$(this).attr("data-ajax"),true);
							xhr.send(form);
						}

						else
						{
							xhr.open("post",$(this).attr("data-ajax"),true);
							xhr.send(form);	
						}	
							
				}
			}

		}

	}

	if(value_empty)
	{
		if($(this).attr("sweetalert") !== undefined)
		{
			// hrm_alert(message + "<br>Some Required Field's Are Empty")
            	swal({
              title: "Error",
              text: "Some Required Field's Are Empty",
              icon: "error",
              showCloseButton: true
            
            });
		}
		else
		{
			// alert(message + "<br>Some Required Field's Are Empty");
			swal({
              title: "Error",
              text: "Some Required Field's Are Empty",
              icon: "error",
              showCloseButton: true
            
            });
			
		}
		msg = $(".submit").attr("btn");
        $(".submit").html(msg);
		
	}


	

});
	

$(".login").on("click",function(e)
{

	empty = false;
	validate();
	
	if(!empty)
	{	
		
		    
			$(".login").html("please wait...");
			
			$(this).append("<i class=\"fa fa-spinner fa-spin loader\" style=\"font-size:24px\"></i>");

			xhr.addEventListener("load",function(e)
			{
				
			
				
				
				if(xhr.responseText == "success")
				{
				   
					$(".login").html("Sign in");
					
					
					location.assign("index.php");
				}
				else
				{
					
					$(".login").html("Sign in");
				    swal({
                      title: "Error",
                      text: xhr.responseText,
                      icon: "error",
                      showCloseButton: true
                    
                    });
                    
						
				}
		});
	
		xhr.open("post",$(this).attr("data-ajax"),true);
		xhr.send(form);		


	
	}

	if(value_empty)
	{
		swal({
          title: "Error",
          text: "Some Required Field's Are Empty",
          icon: "error",
          showCloseButton: true
        
        });
	}


});
	
	
	
function validate()
{	
	message = "";
	value_empty = false;
	  
	
	$(".input").each(function(e)
	{	
		if($(this).attr("unique") !== undefined)
		{
			if($(this).attr("unique") == "Not Unique")
			{
				value_empty = true;
				alert($(this).attr("label") + " already exist");
				message += $(this).attr("label") + " already exist" + "<br>";
			}
				
		}
	});

	$(".input").each(function()
	{
	    
		if($(this).attr("data-name") == "table")
		{
			table = $(this).val();
		}
			//alert($(this).attr("required"));
		if($(this).attr("required") !== undefined)
		{
			if($(this).val() === "")
			{
				empty = true;
				value_empty = true;
				$(this).css("border-bottom","2px solid red");
			}	
		}

		if($(this).attr("password") !== undefined)
		{
			password = $(this).val();
		
			
		}
		
		if($(this).attr("chk_password") !== undefined)
		{
			chk_password = $(this).val();
			
		}
		else{
		    chk_password = null;
		}
		if($(this).attr("login_pwd") !== undefined)
		{
			login_password = $(this).val();	
			
		}

		//Validate For Numeric figures
		if($(this).attr("type") == "number")
		{
			var reg = /\d/;
			if(!reg.test($(this).val()))
			{
				label = $(this).attr("label");
				alert(label +" is not a valid Number");
				message += label +" is not a valid Number" + "<br>";
			

			    empty = true;		
			}
			else
			{
				if($(this).attr("min") !== undefined)
				{
					if(parseInt($(this).attr("min")) > parseInt($(this).val()))
					{
						label = $(this).attr("label");
						alert(label +" Must Not Be More Than "+ $(this).attr("min"));		
						message += label +" Must Not Be More Than "+ $(this).attr("min") + "<br>";
								

					    empty = true
					}
				}
				if($(this).attr("max") !== undefined)
				{
					if(parseInt($(this).attr("max")) < parseInt($(this).val()))
					{
						label = $(this).attr("label");
						alert(label +" Must Not Be Lesser Than  "+ $(this).attr("max"));		
						message += label +" Must Not Be Lesser Than "+ $(this).attr("max") + "<br>";

					   empty = true
					}
				}
			}

		}

		//Validate For Email figures
		if($(this).attr("type") == "email")
		{
			var regs = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;/^[a-zA-Z0-9]+$/;
			if(!regs.test($(this).val()))
			{
				label = $(this).attr("label");
				alert(label +" is not a valid email adddress");
				message += label +" is not a valid email adddress" + "<br>";
				alert(label +" is not a valid email address");

			    empty = true;		
			}
			else
			{
				if($(this).attr("min") !== undefined)
				{
					if(parseInt($(this).attr("min")) > parseInt($(this).val()))
					{
						var label = $(this).attr("label");
						alert(label +" Must Not Be Lesser Than "+ $(this).attr("min"));		
						message += label +" Must Not Be Lesser Than "+ $(this).attr("min") + "<br>";

						empty = true
					}
				}
			}
          
		}

		//Validate For name figures
		if($(this).attr("type") == "names")
		{
			regs = '/^[a-zA-Z]+$/';
			if(!reg.test($(this).val()))
			{
				label = $(this).attr("label");
				alert(label +" is not a valid name");
				message += label +" is not a valid name" + "<br>";
			

			    empty = true;		
			}
			else
			{
				if($(this).attr("min") !== undefined)
				{
					if(parseInt($(this).attr("min")) > parseInt($(this).val()))
					{
					    label = $(this).attr("label");
						alert(label +" Must Not Be Lesser Than "+ $(this).attr("min"));		
						message += label +" Must Not Be Lesser Than "+ $(this).attr("min") + "<br>";

					    empty = true
					}
				}
			}

		}
		//Validate For Files
		if($(this).attr("file") !== undefined)
		{
			var file = document.getElementById('file').files[0];
			form.append("file",file);
		}

		//Validate For Min Character
		if($(this).attr("min-len") !== undefined)
		{
			if(parseInt($(this).attr("min-len")) > $(this).val().length)
			{
				label = $(this).attr("label");
				alert(label +" Must Not Be Lesser Than "+ $(this).attr("min-len") + " Character");		
				message += label +" Must Not Be Lesser Than "+ $(this).attr("min-len") + " Character" + "<br>";

			    empty = true
			}
		}

		//Validate For Current Password
		if($(this).attr("match") !== undefined)
		{
			label = $(this).attr("label");

			if($(this).attr("match") != $(this).val())
			{
				alert(label +" is An Incorrect Pin");
				hrm_alert(label +" is An Incorrect Pin","error","ERROR Message");
				message += label +" is An Incorrect Pin" + "<br>";
			    empty = true;		
			}
		}

		//Validate For length Of password
		if($(this).attr("length") !== undefined)
		{
			label = $(this).attr("label");

			//alert($(this).val().length);
			if(parseInt($(this).attr("length")) != $(this).val().length)
			{
				alert(label +" is must not be less than " + parseInt($(this).attr("length")) + " Character");
				

				message += label +" is must not be less than " + parseInt($(this).attr("length")) + " Character" + "<br>";

			    empty = true;		
			}
		}
			//Validate For Dates
		if($(this).attr("type") == "date")
		{
			label = $(this).attr("label");
		    regs = /\d{2}\/\d{2}\/\d{4}/;
			if(!regs.test($(this).val()))
			{
				
				alert(label +" is not a valid Date");
				

				message += label +" is not a valid Date" + "<br>";

			    empty = true;		
			}
			else
			{
				var date = $(this).val().split("/");


				if(parseInt(date[0]) > 12)
				{
					alert("Month is not a valid ");
					message += "Month is not a valid " + "<br>";
					empty = true;
				}
				if(parseInt(date[1]) > 31)
				{
					alert("Day is not a valid");
					message += "Day is not a valid" + "<br>";
					empty = true;	
				}
				if(parseInt(parseInt(date[0])) == 2 && parseInt(date[1]) > 29)
				{					
					alert("Day is not a valid");
					message += "Day is not a valid" + "<br>";
					empty = true;		
				}				
			}
		}

			if($(this).attr("type") == "checkbox")
			{
				
				
				if($(this).is(":checked"))
				{
					
					chk_box = "on";
					
				}
				else if($(this).is(":not(:checked)"))
				{
					
					chk_box = "";
					
				}
				form.append($(this).attr("check-name"), chk_box);
			}
			
			if($(this).attr("data-name") !== undefined)
			{
                form.append($(this).attr("data-name"), $(this).val());
               
                
			}
			
		});
		
	if(chk_password != null && password !== chk_password)
	{
		
		alert("PASSWORDS DOESN'T MATCH");
		empty = true;
		value_empty = true;
	
	}

		

}