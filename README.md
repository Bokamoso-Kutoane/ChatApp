# Bird Noise* (The Anti-UX Messaging Platform)
Yes, you can call it Bird Noise or make bird noises when you name it.

# Project Overview

Bird Noise* is a full-stack PHP/MySQL messaging application designed with a focus on **intentional latency, friction and fustration**; in an attempt to simulate older means of sending messages and the various troubles of successfully doing so. Unlike modern instant messaging platforms, Bird Noise* simulates the unpredictability, uncertianty and stressfullness of physical transportation-based communication.


## The Technology Stack

* Backend: PHP 8.x
* Database: MySQL
* Frontend: HTML5 & CSS3
* Authentication: Session-based PHP authentication with manual password hashing.

# QA & Testing Perspective (Understanding The "Why")
This project was made to learn and explore **Edge-Case Handlng** and **Systematic Unpredictability**.

* **Message Corruption Logic:** Implemented a *mistake* algorithm with a 30% failure rate to test string manipulation and data integrity.
* **Anti-UX Design:** A study in buggy and unfinished onboarding and deliberate user fustration to observe how standard UI practices and the lack of them affect user retention (and blood pressure).
* **Asynchronous Delays:** Messages are intentionally withheld until a specific time, forcing the system to handle "hidden" data that will only be visible after a server-side time check.

## Key Features

* **Various Transportation Modes:** Users are able to choose between Pigeons, Redbull Athletes, Dogs or Grandparents; each with their unique delay logic
* **Wall of Shame:** A long-winded, mandatory, legally questional onboarding contract.
* **Sidebar:** A responsive, single-page feel without the use of heavy JS frameworks.

# Installation
Of doom and dispair

1. Clone the repo.
2. Import ChatApp.sql into your local MySQL environment.
3. Update db.php with your credentials.
4. Apologies to anyone you are dragging into using this madness
