# Bird Noise* (The Anti-UX Messaging Platform)
Yes, you can call it Bird Noise or make bird noises when you name it.

# Project Overview

Bird Noise* is a full-stack PHP/MySQL messaging application designed with a focus on **intentional latency, friction and frustration**; in an attempt to simulate older means of sending messages and the various troubles of successfully doing so. Unlike modern instant messaging platforms, Bird Noise* simulates the unpredictability, uncertainty, and stressfulness of physical transportation-based communication.


## The Technology Stack

* Backend: PHP 8.x
* Database: MySQL
* Frontend: HTML5 & CSS3
* Authentication: Session-based PHP authentication with manual password hashing.

# QA & Testing Perspective (Understanding The "Why")
This project was made to learn and explore **Edge-Case Handling** and **Systematic Unpredictability**.

* **Message Corruption Logic:** Implemented a *mistake* algorithm with a 30% failure rate to test string manipulation and data integrity.
* **Anti-UX Design:** A study in buggy and unfinished onboarding and deliberate user frustration to observe how standard UI practices and the lack of them affect user retention (and blood pressure).
* **Asynchronous Delays:** Messages are intentionally withheld until a specific time, forcing the system to handle "hidden" data that will only be visible after a server-side time check.

## Key Features

* **Various Transportation Modes:** Users are able to choose between Pigeons, Redbull Athletes, Dogs or Grandparents; each with their unique delay logic
* **Wall of Shame:** A long-winded, mandatory, legally questionable onboarding contract.
* **Sidebar:** A responsive, single-page feel without the use of heavy JS frameworks.

# Installation
Of doom and despair

1. Clone the repo.
2. Import ChatApp.sql into your local MySQL environment.
3. Update db.php with your credentials.
4. Apologies to anyone you are dragging into using this madness

# Chaos Logic

## To demonstrate backend logic and string manipulation, the application uses a weighted randomization system:

* **Success Rate ($P \le 40\%$):** Standard delivery via `if ($damage_roll <= 40)`.
* **Symbol Corruption ($40\% < P \le 70\%$):** Uses a `for` loop and `array_rand()` to swap 25% of characters with symbols.
* **Data Loss ($P > 70\%$):** Triggers `str_shuffle` or `substr` truncation based on a nested `rand(1, 10)` check.

# What Errors May Occur

* **Normal Delivery:** The message gets to you without any trouble at all. Clean and normal.
  * **Odds:** Roughly equal to dropping a slice of bread and having it land on the dry side of the slice. *A Miracle.* Don't get used to it though.
* **Messenger Error:** The message arrives. The message might have gibberish, numbers and symbols instead of normal letters. Mistakes happen.
  * **Odds:** About the same odds of kicking or throwing a ball straight to a toddlers head, no matter your aim. Better get your Wordle skills up.
* **Life happens:** The message will either be scrambled or it won't even be the full message. Reliability issues on my end.
  * **Odds:** You have a better chance guessing a strangers favourite colour on the first try.
* **Requires Empathy:** I don't even know what happens but apparently not all the message get delivered. A tragedy, or something.
  * **Odds:** Chances of not getting your message sent is higher than the chance of a bug smacking your face. 
 
