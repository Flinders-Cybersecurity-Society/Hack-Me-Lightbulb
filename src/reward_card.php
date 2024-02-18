<?php
?>
<link href="output.css" rel="stylesheet">
<script src="scripts/confetti.js"></script>

<script>
  startConfetti();

  function hideRewardCard() {
    console.log("Hiding");
    stopConfetti();
    console.log("Stopped Confetti");

    document.getElementById("reward_card").style.display = "none";
    console.log("Hidden Card");
  }
</script>


<?php
$totalChallenges = 3;
$completedChallenges = $_SESSION["solved_challenge_1"] + $_SESSION["solved_challenge_2"] + $_SESSION["solved_challenge_3"];
$challengesLeft = $totalChallenges - $completedChallenges;

?>


<div id="reward_card">
  <!-- <script type="text/javascript" src="scripts/onboard.js"></script> -->

  <div class="relative z-10 bg-indigo-500" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 bg-indigo-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
      <?php if ($challengesLeft > 0) { ?>
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

          <div id="slides-container"
            class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">

            <div id="slide-1">
              <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-2xl font-medium leading-6 text-gray-900" id="modal-title">Congrats You Got In!!!
                  <?php if ($completedChallenges > 1)
                    echo "Again!!!!" ?>
                  </h3>
                  <div class="mt-2">
                    <p class="text-lg text-gray-500">You've used your hacking skills to break into our master light control
                      page! <br><br><b>There is still
                      <?php echo $challengesLeft ?> other
                      <?php if ($challengesLeft > 1) {
                        echo "ways";
                      } else
                        echo "way"; ?> to get in.
                    </b> After playing with our light, press log out
                    and try
                    a different way! (and most importantly, ask us any questions you have!)
                  </p>
                </div>
              </div>
            </div>




            <div class="mt-5 sm:mt-6">
              <button type="button" id="next-button" onclick="hideRewardCard()"
                class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Access
                Admin Panel & Mess With Our Light</button>
            </div>
          </div>
        <?php } else { ?>
          <script>
            stopConfetti();
          </script>

          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

            <div id="slides-container"
              class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">

              <div id="slide-1">
                <img class="items-center justify-center" src="images/congrats.webp">
                <div class="mt-3 text-center sm:mt-5">
                  <h3 class="text-2xl font-medium leading-6 text-gray-900" id="modal-title">You're a Master Hacker!!!!
                  </h3>
                  <div class="mt-2">
                    <p class="text-lg text-gray-500">But it doesn't have to end here! <br><br>Sign up as a CySoc Member
                      (Below) and come talk to us about how to progress your learning in Cyber! <br><br>Thanks for playing
                  </div>
                </div>
              </div>




              <div class="mt-5 sm:mt-6">
                <button type="button" id="next-button"
                  onclick="location.href='https://www.flinderscybersociety.org/register'"
                  class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Signup
                  as a Member of Flinders Cybersecurity Society</button>
              </div>
            </div>


          <?php } ?>
        </div>
      </div>
    </div>



  </div>

  </html>