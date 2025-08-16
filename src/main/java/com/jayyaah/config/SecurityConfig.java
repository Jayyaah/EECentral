package com.jayyaah.eecentral.config;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.web.SecurityFilterChain;

@Configuration
public class SecurityConfig {

    @Bean
    public SecurityFilterChain securityFilterChain(HttpSecurity http) throws Exception {
        http
                .authorizeHttpRequests(auth -> auth
                        .requestMatchers("/api/maps", "/api/posts").permitAll() // routes publiques
                        .anyRequest().authenticated() // le reste nécessite login
                )
                .formLogin(form -> form
                        .defaultSuccessUrl("/admin", true) // après login → /admin
                )
                .httpBasic();

        return http.build();
    }
}
