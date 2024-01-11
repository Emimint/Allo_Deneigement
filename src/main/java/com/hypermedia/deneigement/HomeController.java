package com.hypermedia.deneigement;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class HomeController {

   @RequestMapping("/home")
    public String test() {
        return "index";
    }

    @RequestMapping("/login")
    public String showLogin() {
        return "login";
    }

    @RequestMapping("/registration")
    public String showRegistration() {
        return "registration";
    }

    @RequestMapping("/Footer")
    public String showFooterPage() {
        return "Footer";}

        
    @RequestMapping("/fournisseur")
    public String showFournisseur() {
        return "pages/fournisseur";
    }
    
    @RequestMapping("/contactPage")
    public String showContactPage(){
       return "contactPage";
    }
}
