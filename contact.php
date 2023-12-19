<?php include("headercontactus.php");?> 

        <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            <!-- section begin -->
            <section id="subheader" class="text-light" data-stellar-background-ratio=".2" data-bgimage="url(images/banner-contact.jpg) top no-repeat">
                <div class="center-y relative text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h1>Contact Us</h1>
                                <p>Reputation. Respect. Result.</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->
            <section aria-label="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                         
                            <h3>Reach Us</h3>
                            <address class="s1">
                                <span>Dr. V. VENKATESAN, M.A, M.L, Ph. D.,<br>
Advocate,<br>
Former Senior Central Govt. Standing Counsel<br>
High Court, Chennai.</span>
<span><i class="fa fa-location-arrow blue"></i>Jains Aashiana, 1st Phase,<br>
    G-1 No.13 Vembuli Amman Koil Street,<br>
    K.K.Nagar, Chennai - 600 078,<br>
	Tamil Nadu, INDIA.
	</span>
                              <a href="tel:044-42024598"><span><i class="fa fa-phone blue"></i>044-42024598</span></a>
							   <a href="tel:+91-9841026610"><span><i class="fa fa-mobile blue"></i>+91-9841026610</span></a>
							     <a href="mailto:v2legalfirm@gmail.com"><span><i class="fa fa-envelope blue"></i>v2legalfirm@gmail.com</span></a>
                            </address>
                        </div>
                        <div class="col-md-8">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7773.7385472071355!2d80.189621!3d13.043992!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xce6f8c500d64655f!2sJains%20Aashiana%20Apartments!5e0!3m2!1sen!2sin!4v1614941590654!5m2!1sen!2sin" width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                      
                    </div>
                </div>
            </section>
	        <section aria-label="section" class="text-light" data-bgcolor="#111111">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 mb-sm-30 text-center">
                            <h3>Do you have any question?</h3>
                            <!--<form name="contactForm" id="contact_form" class="form-border" method="post" action="https://www.designesia.com/themes/justica/email.php">-->
                            <form name="contactForm" id="contact_form" class="form-border" method="post" action="contact-mail.php">
                                <div class="field-set">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" />
                                </div>
                                <div class="field-set">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" />
                                </div>
                                <div class="field-set">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone" />
                                </div>
                                <div class="field-set">
                                    <textarea name="message" id="message" class="form-control" placeholder="Your Message"></textarea>
                                </div>
                                <div class="spacer-half"></div>
                                <div id="submit">
                                    <input type="submit" id="send_message_1" value="Submit Form" class="btn btn-custom" />
                                </div>
                                <div id="mail_success" class="success">Your message has been sent successfully.</div>
                                <div id="mail_fail" class="error">Sorry, error occured this time sending your message.</div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                        </div>
                    </div>
                </div>
            </section>
          
        </div>
        <!-- content close -->
        <a href="#" id="back-to-top"></a>

<?php include("footer.php");?>	

   <script>
    
    $('#contact_form').submit(function(event) {
        event.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('<key>', {action: 'subscribe_newsletter'}).then(function(token) {
                $('#contact_form').prepend('<input type="hidden" name="token" value="' + token + '">');
                $('#contact_form').prepend('<input type="hidden" name="action" value="subscribe_newsletter">');
                $('#contact_form').unbind('submit').submit();
            });
        });
});

</script>






















