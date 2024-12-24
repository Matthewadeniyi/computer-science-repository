<?php
  
include_once('inc/config.php');

?>
<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Lexend%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>Login to your account</title>
    <!-- <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," /> -->
    <link href="assets/images/favicon.png" rel="icon" type="image">

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style>
      .login{
        transition: background-color 0.2s;
      }
      .login:hover{
        background-color: #0b4499;
      }
      header{
        position: fixed;
        left: 0;
        right: 0;
        z-index: 100;
        background-color: white;
      }
      .header-next{
        margin-top: 35px;
      }
      
    </style>
  </head>
  <body>
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden" style='font-family: Lexend, "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">

      <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#F4EFE6] px-10 py-3">
          <div class="flex items-center gap-4 text-[#1C160C]">
            <div class="size-4">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z"
                  fill="currentColor"
                ></path>
              </svg>
            </div>
            <h2 class="text-[#1C160C] text-lg font-bold leading-tight tracking-[-0.015em]">Computer Science Repository</h2>
          </div>
          <div class="flex flex-1 justify-end gap-8">
            <div class="flex items-center gap-9">
            <a class="text-[#111418] text-sm font-medium leading-normal" href="../index.html">Home</a>
            <a class="text-[#1C160C] text-sm font-medium leading-normal" href="./add-project.php">Add Project</a>
            </div>
            <a href="./update-profile.php">

              <div
                class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
                style='background-image: url("https://cdn.usegalileo.ai/sdxl10/9050f252-2b8a-4e5c-8d5c-8e5d288cda79.png");'
              ></div>
            </a>
          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5 header-next">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="@container">
              <div class="@[480px]:p-4">
                <h2 class="text-[#111418] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Login to your account</h2>
                <form method="post" >

                    <div
                      class="flex min-h-[120px] flex-col gap-6 :gap-3 @[480px]:rounded-xl items-center justify-center p-4 header-next"style='background:none;'>                        
                        
                            <label class="flex flex-col min-w-40 h-14 w-full max-w-[480px] @[480px]:h-13 ">
                                <div class="flex w-full flex-1 items-stretch rounded-xl h-full">
                                    <div
                                    class="text-[#637588] flex border border-[#dce0e5] bg-white items-center justify-center pl-[15px] rounded-l-xl border-r-0"
                                    data-icon="MagnifyingGlass"
                                    data-size="20px"
                                    data-weight="regular"
                                    >
                                    <svg class="h-8 w-8 text-blue-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <line x1="22" y1="2" x2="11" y2="13" />  <polygon points="22 2 15 22 11 13 2 9 22 2" /></svg>
                                    </div>
                                    <input
                                    name="admin_no"
                                    placeholder="enter AdminNo"
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border border-[#dce0e5] bg-white focus:border-[#dce0e5] h-full placeholder:text-[#637588] px-[15px] rounded-r-none border-r-0 pr-2 rounded-l-none border-l-0 pl-2 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal"
                                    value=""
                                    />
                                    <div class="flex items-center justify-center rounded-r-xl border-l-0 border border-[#dce0e5] bg-white pr-[7px]">
                                   
                                    </div>
                                </div>
                            </label>
                        
                        
                            <label class="flex flex-col min-w-40 h-14 w-full max-w-[480px] @[480px]:h-13 ">
                                <div class="flex w-full flex-1 items-stretch rounded-xl h-full">
                                    <div
                                    class="text-[#637588] flex border border-[#dce0e5] bg-white items-center justify-center pl-[15px] rounded-l-xl border-r-0"
                                    data-icon="MagnifyingGlass"
                                    data-size="20px"
                                    data-weight="regular"
                                    >
                                    <svg class="h-8 w-8 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="5" y="11" width="14" height="10" rx="2" />  <circle cx="12" cy="16" r="1" />  <path d="M8 11v-4a4 4 0 0 1 8 0v4" /></svg>
                                    </div>
                                    <input
                                    name="password"
                                    placeholder="enter password"
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border border-[#dce0e5] bg-white focus:border-[#dce0e5] h-full placeholder:text-[#637588] px-[15px] rounded-r-none border-r-0 pr-2 rounded-l-none border-l-0 pl-2 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal"
                                    value=""
                                    />
                                    <div class="flex items-center justify-center rounded-r-xl border-l-0 border border-[#dce0e5] bg-white pr-[7px]">                      
                                    </div>
                                </div>
                            </label>
                            <button type="submit"
                            name="adminLogin"
                            class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#1972d2] text-white text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                        >
                            <span class="truncate">Login</span>
                        </button>
                        
                    </div>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    <?php include_once('inc/footer.php');?>
  </body>
</html>
