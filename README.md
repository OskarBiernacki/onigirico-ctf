# 🍙 OniGiriCo

Welcome to the OniGiriCo CTF!  
Your goal is to hack into the OniGiriCo wholesale website and discover their secret ingredient.

## Challenge Description

This is a **web security** challenge.  
You will face a simulated environment of a wholesale onigiri supplier. Your task is to explore the website, identify and exploit vulnerabilities, and ultimately retrieve the secret ingredient hidden by the OniGiriCo team. The challenge is designed to test your skills in web application security, including information gathering, vulnerability analysis, and exploitation.

## Getting Started

To run the challenge locally, you need [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/).

1. Clone this repository.
2. In the project directory, run:
```bash
docker compose up --build
```
3. Open your browser and go to [http://localhost](http://localhost).

The default port is 80, but you can change it in `docker-compose.yml` if needed.

## Objective

Your main objective is to find and extract the secret ingredient from the OniGiriCo system. Use your web security skills to investigate the application, bypass protections, and access hidden information.

## Spoilers And Details

Below are some of the techniques and vulnerabilities you may need to use or encounter during the challenge:

- **Page Enumeration:** Discover hidden or unlisted pages by exploring the website structure.
- **Cookie Editing:** Manipulate cookies to change your privileges or access restricted content.
- **Parameter Decoding:** Decode and analyze URL or form parameters to reveal sensitive data or hidden functionality.
- **Local File Inclusion (LFI):** Exploit file inclusion vulnerabilities to read files from the server.

The challenge is intended for educational purposes and to help you practice real-world web security skills.

## Authors

This CTF was created by Oskar Biernacki for CTF_PJATK_2025.