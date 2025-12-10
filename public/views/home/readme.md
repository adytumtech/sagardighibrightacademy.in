 Summary of Changes:

   1. Updated home.js:
      - When a user clicks on a notice, the entire notice data (title, body, date, etc.) is now stored in sessionStorage
      - The user is then redirected to home/notice_details without any URL parameters

   2. Updated notice_details.php:
      - Instead of making an API call, it now retrieves the notice data from sessionStorage
      - Displays the notice title and HTML body directly from the stored data

   3. Simplified controller and model:
      - Removed the getNoticeById method from both the controller and model since it's no longer needed
      - The notice_details method no longer requires a parameter

  How It Works:

   1. When users are on the home page, notices are loaded as before
   2. When a user clicks on a notice, the full notice object is stored in sessionStorage
   3. The user is redirected to the notice_details page
   4. The notice_details page retrieves the stored notice data from sessionStorage
   5. The notice title and body are displayed without making another API call

  This approach eliminates the need for an additional API call when viewing notice details, making the application faster and more efficient. The notice data is passed directly from the home
  page to the details page via browser storage.
