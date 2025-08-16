package com.jayyaah.eecentral.controller;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;
import java.util.Map;

@RestController
public class MapController {

    @GetMapping("/api/maps")
    public List<Map<String, String>> getMaps() {
        return List.of(
                Map.of("id", "1", "name", "Liberty Falls"),
                Map.of("id", "2", "name", "Die Maschine")
        );
    }
}
