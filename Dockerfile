# ---------- Build Stage ----------
FROM gradle:8.8-jdk21-alpine AS build
WORKDIR /app

# Copier uniquement les fichiers de config d'abord (cache deps)
COPY build.gradle.kts settings.gradle.kts ./
RUN gradle dependencies --no-daemon || true

# Copier le reste du code
COPY . .

# Construire l'artefact (on skippe les tests ici pour la rapidité)
RUN gradle clean bootJar -x test --no-daemon

# ---------- Runtime Stage ----------
FROM eclipse-temurin:21-jre-alpine
WORKDIR /app

# Copier le JAR depuis l'étape de build
COPY --from=build /app/build/libs/*-SNAPSHOT.jar app.jar

# Exposer le port
EXPOSE 8080

# Utiliser le profil docker
ENV SPRING_PROFILES_ACTIVE=docker

ENTRYPOINT ["java","-jar","/app/app.jar"]
