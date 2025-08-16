package com.jayyaah.eecentral.controller;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class AdminController {

    @GetMapping("/admin")
    public String adminHome() {
        return "Bienvenue Admin ! 🚀";
    }
}
