WEB DEVELOPMENT + AI AGENCY WEBSITE

Previewing: Download the ZIP, extract it, open the folder, and double-click index.html. It opens locally in Chrome with all browser features.

Business information: edit assets/js/business-config.js to replace [AGENCY NAME], phone, email, service area, address, and hours. Each page is normal HTML, so edit page text directly.

Graphics: Local SVG graphics are in assets/svg/. Replace any SVG using the same filename and a similar aspect ratio.

Contact form: PHP does not run through file://. Upload all files to PHP-supported hosting, open contact-handler.php, replace recipient_email, save, then test from the live domain. PHP mail depends on the hosting provider.

Upload: In cPanel File Manager, upload/extract the folder into public_html. With FTP, transfer its contents into your web root. Standard PHP hosting works the same way: upload every file while retaining assets folders.
