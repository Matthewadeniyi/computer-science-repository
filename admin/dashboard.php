<?php 

session_start();
if (!isset($_SESSION['admin_no'])) {
  header("Location: login.php"); // Redirect to login page if not logged in
  exit();
  }
?>
<html>
 <?php include_once('inc/head.php')?>
  <body>
    <?php include_once('inc/header.php');?>
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-xy-hidden" style='font-family: Lexend, "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <div class="gap-1 px-6 flex flex-1 justify-center py-5">
          <?php include_once('inc/left-nav.php');?>
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-4"><p class="text-[#111418] tracking-light text-[32px] font-bold leading-tight min-w-72">Admin dashboard</p></div>
            <div class="p-4 @container">
              <div class="flex flex-1 flex-col items-start justify-between gap-4 rounded-xl border border-[#dce0e5] bg-white p-5 @[480px]:flex-row @[480px]:items-center">
                <div class="flex flex-col gap-1">
                  <p class="text-[#111418] text-base font-bold leading-tight"></a>Add a project</p>
                  <p class="text-[#637588] text-base font-normal leading-normal">Create a new project for your team.</p>
                </div>
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-8 px-4 bg-[#1972d2] text-white text-sm font-medium leading-normal"
                >
                  <span class="truncate"><a href="add-project.php">Create project</a></span>
                </button>
              </div>
            </div>
            <div class="p-4 @container">
              <div class="flex flex-1 flex-col items-start justify-between gap-4 rounded-xl border border-[#dce0e5] bg-white p-5 @[480px]:flex-row @[480px]:items-center">
                <div class="flex flex-col gap-1">
                  <a href="view-all-projects.php"><p class="text-[#111418] text-base font-bold leading-tight">View all projects</p></a>
                  <p class="text-[#637588] text-base font-normal leading-normal">Browse all the projects in your Repository.</p>
                </div>
                <a class="text-sm font-bold leading-normal tracking-[0.015em] flex gap-2 text-[#111418]" href="view-all-projects.php">
                  View projects
                  <div class="text-[#111418]" data-icon="ArrowRight" data-size="20px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"
                      ></path>
                    </svg>
                  </div>
                </a>
              </div>
            </div>
            <div class="p-4 @container">
              <div class="flex flex-1 flex-col items-start justify-between gap-4 rounded-xl border border-[#dce0e5] bg-white p-5 @[480px]:flex-row @[480px]:items-center">
                <div class="flex flex-col gap-1">
                  <p class="text-[#111418] text-base font-bold leading-tight">Manage users</p>
                  <p class="text-[#637588] text-base font-normal leading-normal">Invite new users, manage permissions, and view usage.</p>
                </div>
                <a class="text-sm font-bold leading-normal tracking-[0.015em] flex gap-2 text-[#111418]" href="#">
                  Manage users
                  <div class="text-[#111418]" data-icon="ArrowRight" data-size="20px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"
                      ></path>
                    </svg>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <footer class="flex justify-center">
          <div class="flex max-w-[960px] flex-1 flex-col">
            <footer class="flex flex-col gap-6 px-5 py-10 text-center @container">
              <div class="flex flex-wrap items-center justify-center gap-6 @[480px]:flex-row @[480px]:justify-around">
                <a class="text-[#3b6ea5] text-base font-normal leading-normal min-w-40" href="#">Privacy Policy</a>
                <a class="text-[#3b6ea5] text-base font-normal leading-normal min-w-40" href="#">Terms of Service</a>
              </div>
              <div class="flex flex-wrap justify-center gap-4">
                <a href="#">
                  <div class="text-[#3b6ea5]" data-icon="TwitterLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M247.39,68.94A8,8,0,0,0,240,64H209.57A48.66,48.66,0,0,0,168.1,40a46.91,46.91,0,0,0-33.75,13.7A47.9,47.9,0,0,0,120,88v6.09C79.74,83.47,46.81,50.72,46.46,50.37a8,8,0,0,0-13.65,4.92c-4.31,47.79,9.57,79.77,22,98.18a110.93,110.93,0,0,0,21.88,24.2c-15.23,17.53-39.21,26.74-39.47,26.84a8,8,0,0,0-3.85,11.93c.75,1.12,3.75,5.05,11.08,8.72C53.51,229.7,65.48,232,80,232c70.67,0,129.72-54.42,135.75-124.44l29.91-29.9A8,8,0,0,0,247.39,68.94Zm-45,29.41a8,8,0,0,0-2.32,5.14C196,166.58,143.28,216,80,216c-10.56,0-18-1.4-23.22-3.08,11.51-6.25,27.56-17,37.88-32.48A8,8,0,0,0,92,169.08c-.47-.27-43.91-26.34-44-96,16,13,45.25,33.17,78.67,38.79A8,8,0,0,0,136,104V88a32,32,0,0,1,9.6-22.92A30.94,30.94,0,0,1,167.9,56c12.66.16,24.49,7.88,29.44,19.21A8,8,0,0,0,204.67,80h16Z"
                      ></path>
                    </svg>
                  </div>
                </a>
                <a href="#">
                  <div class="text-[#3b6ea5]" data-icon="FacebookLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm8,191.63V152h24a8,8,0,0,0,0-16H136V112a16,16,0,0,1,16-16h16a8,8,0,0,0,0-16H152a32,32,0,0,0-32,32v24H96a8,8,0,0,0,0,16h24v63.63a88,88,0,1,1,16,0Z"
                      ></path>
                    </svg>
                  </div>
                </a>
                <a href="#">
                  <div class="text-[#3b6ea5]" data-icon="LinkedinLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M216,24H40A16,16,0,0,0,24,40V216a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V40A16,16,0,0,0,216,24Zm0,192H40V40H216V216ZM96,112v64a8,8,0,0,1-16,0V112a8,8,0,0,1,16,0Zm88,28v36a8,8,0,0,1-16,0V140a20,20,0,0,0-40,0v36a8,8,0,0,1-16,0V112a8,8,0,0,1,15.79-1.78A36,36,0,0,1,184,140ZM100,84A12,12,0,1,1,88,72,12,12,0,0,1,100,84Z"
                      ></path>
                    </svg>
                  </div>
                </a>
              </div>
              <p class="text-[#3b6ea5] text-base font-normal leading-normal">Copyright <?php echo date('Y')?> Academic Repository</p>
            </footer>
          </div>
        </footer>
      </div>
    </div>
  </body>
</html>
