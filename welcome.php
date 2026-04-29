<?php
include "db.php";

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>The Bird Contract</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="chat-app">
      <div class="chat-sidebar">
        <div class="sidebar-header">LEGAL BIRD STUFF</div>
        <div style="text-align:center; padding-top: 50px;">
          <span style="font-size: 4rem;">📜</span>
        </div>
      </div>

      <div class="chat-main">
        <div class="chat-header"><h2>The Terms of the Coop</h2></div>
        <div class="chat-body" style="padding: 40px; line-height: 1.6;">
          <h3>Welcome, Fledgling.</h3>
          <p>Before you start sending mail, you must understand that these are living beings too. Just like me, just like you, just like everything you love in this world. 
            We live, breathe, smell, feel, see, and some of us either don't even get those experiences altogether. So you should respect everything around you. That grass you step on. 
            The paper you use; guess where it comes from? Your clothes. Where does power come from. We all live in an ecosystem. We exist. <b>YOU</b> exist. You are seen. You are felt. 
            You are loved. So respect these animals, energized humans with smaller than average or less developed frontal lobes, the sweet old grandmas and grandpas volunteering to help you as a way to earn money, 
            talk to people, take walks, have <i>something</i> to do besides sit inside and wait for their time, all alone with their thoughts, dreams, envy, pain, sorrow and regrets lingering in their minds because 
            nobody is there to break their daydreams besides the sound of a car passing by, a pet, children screaming outside, or maybe the brain wanders way too far, to the point they wake up and realize it was all 
            in their heads, or by a sharp pain due to old age. You need to be aware. <b>Awake.</b> And every time you send a message, you are risking someone else's life. You are putting pressure on them. And you know, 
            stuff can happen. They can take risks of their own. So be kind. Be patient. Imagine if it was you who was being used to do all of this. Imagine. You're sitting there, acting all bigger and better, just because 
            you don't have anything to do, but other people don't have that luxury. Shame on you. I don't know why but I'm too in the zone and I feel as though you should be shamed so shame on you. Shame. <br>Anyways... 
            <br><br>The risks are:</p>
            <ul style="margin: 20px; font-size: 0.9rem;">
              <li><strong>The Delay:</strong> Birds have wings, not fiber-optic cables. Dogs have legs, not rockets. Redbull athletes can do it, but to get them up for the job, we had to 
                                              create challenges along the way; don't blame us. Old people get tired; they forget, they're just there for a good time you know? 
                                              Messages take 5 to 45 minutes. Maybe longer. Depends on the day, honestly; you'll just have to wait and see.</li>
              <li><strong>The Damage:</strong> 30% of these messengers get distracted, tired, hungry, bored or genuinely lost. Your message might arrive with pieces of information missing, could be shuffled or you may never actually 
                                              receive the right message. To be more precise, you won't even know you were sent the wrong message if I'm being honest with you.</li>
              <li><strong>The Chaos:</strong> I don't even know man. It's not like I'm tracking these people and animals; the majority of them just come from the street. We just hope they're trustworthy or smart enough to get to you</li>
            </ul>

          <form action="welcome_process.php" method="POST" style="margin-top: 30px; border-top: 1px dashed #ccc; padding-top: 20px;">
            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
              <input type="checkbox" required style="width: 20px; height: 20px; justify-content:flex-start">
              <span style="font-size: 0.6rem;">I agree that I won't complain, argue or sue the creator just because I had bad luck and because of my luck, things went badly for me. <b>Me</b> as in, the person reading this right now; yes, me. It was all my fault. The creator is the best too. Just imagine the rest of this is important or something.</span>
            </label>
            <button type="submit" name="accept_terms" class="send-btn" style="display: block; margin: 20px auto 0 auto; width: 180px; height: 30px; font-size: 0.8rem;">
              I MEAN, I GUESS
            </button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
