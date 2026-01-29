# Security Vulnerability Audit - Hack Me Lightbulb

This document identifies the intentional vulnerabilities in the CTF application and suggests additional ones that can be exploited via mobile browser (without developer tools).

---

## Current Intentional Vulnerabilities

### Task 1: Default Credentials
**File:** `src/scripts/loginVerify.php:11-12`
```php
$defaultUsername = "admin";
$defaultPassword = "admin";
```
**Exploitation:** Simply enter `admin` / `admin` on the login page.
**Mobile-Friendly:** Yes - just requires typing credentials.

---

### Task 2: URL Parameter Manipulation
**File:** `src/login.php:24-27`
```php
if (isset($_GET["loggedin"])) {
    if (($_GET["loggedin"]) == "true") {
        $_SESSION['loggedin'] = true;
```
**Exploitation:** Navigate to `login.php?loggedin=true`
**Mobile-Friendly:** Yes - just requires editing the URL bar.

---

### Task 3: SQL Injection Pattern Detection
**File:** `src/scripts/loginVerify.php:67`
```php
} else if (strpos($username, "OR 1=1") !== false || strpos($username, "OR 1==1") !== false) {
```
**Exploitation:** Enter `' OR 1=1 --` or similar in username field.
**Mobile-Friendly:** Yes - just requires typing in the login form.

---

## Additional Existing Vulnerabilities (Unintentional/Bonus)

### 1. Hardcoded Database Credentials
**File:** `src/scripts/dbconn.php`
- Credentials: `root` / `mysql`
- Exposed in source code

### 2. Debug Mode Enabled in Production
**File:** `src/login.php:5-7`
```php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
```
**Risk:** Leaks SQL queries, file paths, and stack traces to users.

### 3. SQL Injection via String Concatenation
**Files:** `src/scripts/loginVerify.php:36,75` and `src/login.php:28`
```php
$sql = "UPDATE players SET task1 = '1' WHERE uuid = '" . $_SESSION["uuid"] . "';";
```
**Risk:** If uuid can be manipulated, SQL injection is possible.

### 4. Wildcard CORS on All API Endpoints
**File:** `src/api/light-change.php:2`
```php
header("Access-Control-Allow-Origin: *");
```
**Risk:** Any website can call your APIs cross-origin.

### 5. Unauthenticated API Endpoints
**Files:** All files in `src/api/`
- No session or authentication checks
- Anyone can toggle the light or modify the leaderboard

### 6. SQL Query Echo on Error
**File:** `src/scripts/loginVerify.php:57,92`
```php
echo mysqli_error($conn);
echo $sql;
```
**Risk:** Reveals database structure and query details.

---

## Suggested Additional Vulnerabilities (Mobile-Browser Friendly)

These vulnerabilities can all be exploited on a mobile phone without developer tools:

### Task 4: HTML Comment Information Disclosure
**Implementation:** Add hidden credentials in HTML comments
```html
<!-- Debug: backup login - user: debug / pass: letmein123 -->
```
**Exploitation:** Use browser's "View Page Source" option (available on most mobile browsers via menu or `view-source:` URL prefix).
**Difficulty:** Easy

---

### Task 5: Robots.txt Secret Path Disclosure
**Implementation:** Create `src/robots.txt`
```
User-agent: *
Disallow: /secret-admin-panel.php
Disallow: /backup/
Disallow: /debug-login.php
```
**Exploitation:** Navigate to `/robots.txt` then visit the "hidden" paths.
**Difficulty:** Easy

---

### Task 6: Hidden Form Field Manipulation
**Implementation:** Add to login form in `login.php`
```html
<input type="hidden" name="isAdmin" value="false">
```
Then in `loginVerify.php`:
```php
if ($_POST["isAdmin"] === "true") {
    $_SESSION['loggedin'] = true;
    $_SESSION["solved_challenge_6"] = 1;
}
```
**Exploitation:** View page source, note the hidden field, then use a form submission tool or bookmarklet. Alternatively, create a simple HTML page that submits to the endpoint.
**Difficulty:** Medium

---

### Task 7: IDOR (Insecure Direct Object Reference)
**Implementation:** Create `src/player-profile.php`
```php
<?php
require_once "scripts/dbconn.php";
$id = $_GET['id'] ?? 1;
$sql = "SELECT * FROM players WHERE user_id = $id";
$result = mysqli_query($conn, $sql);
$player = mysqli_fetch_assoc($result);
echo "Player: " . $player['username'];
echo "Completed: Task1=" . $player['task1'] . " Task2=" . $player['task2'];
?>
```
**Exploitation:** Change `?id=1` to `?id=2`, `?id=3`, etc. to view other players' data.
**Difficulty:** Easy

---

### Task 8: Forced Browsing / Backup File Discovery
**Implementation:** Create backup files at predictable locations:
- `src/login.php.bak` - Contains plaintext credentials
- `src/config.old` - Contains database settings
- `src/admin-backup.php` - Direct admin access

**Exploitation:** Try common backup extensions: `.bak`, `.old`, `.backup`, `.swp`, `~`
**Difficulty:** Medium

---

### Task 9: Cookie-Based Authentication Bypass
**Implementation:** In `login.php`, also check for a cookie:
```php
if (isset($_COOKIE["authenticated"]) && $_COOKIE["authenticated"] === "yes") {
    $_SESSION['loggedin'] = true;
    $_SESSION["solved_challenge_9"] = 1;
    header("location: light-control.php");
}
// Set a "hint" cookie on page load
setcookie("authenticated", "no", time() + 3600);
```
**Exploitation:** On mobile:
- iOS Safari: Settings > Safari > Advanced > Website Data > find site > edit cookie
- Android Chrome: chrome://settings/siteData > find site
- Or use a cookie editor app/bookmarklet
**Difficulty:** Medium

---

### Task 10: Base64 "Encrypted" Token
**Implementation:** Add to login page:
```html
<!-- Security token: YWRtaW46c3VwZXJzZWNyZXQ= -->
```
And in `loginVerify.php`:
```php
if ($_POST["usernameInput"] === "admin" && $_POST["passwordInput"] === "supersecret") {
    // Grant access - Challenge 10
}
```
**Exploitation:** Decode Base64 `YWRtaW46c3VwZXJzZWNyZXQ=` = `admin:supersecret`
- Mobile users can use online Base64 decoders
**Difficulty:** Easy-Medium

---

### Task 11: Predictable Password Reset Token
**Implementation:** Create `src/reset-password.php`
```php
<?php
// Generate "secure" reset token - actually just MD5 of username
$token = md5($_GET['username']);
// Token for "admin" is always: 21232f297a57a5a743894a0e4a801fc3
if ($_GET['token'] === md5($_GET['username'])) {
    echo "Password reset to: changeme123";
    $_SESSION["solved_challenge_11"] = 1;
}
?>
```
**Exploitation:**
1. Go to `/reset-password.php?username=admin`
2. Google "admin md5 hash" = `21232f297a57a5a743894a0e4a801fc3`
3. Visit `/reset-password.php?username=admin&token=21232f297a57a5a743894a0e4a801fc3`
**Difficulty:** Medium

---

### Task 12: Directory Listing Enabled
**Implementation:** Create `src/backup/` directory with `.htaccess`:
```
Options +Indexes
```
Add files:
- `backup/credentials.txt` - Contains login info
- `backup/database-dump.sql` - Contains user data

**Exploitation:** Navigate to `/backup/` and browse the files.
**Difficulty:** Easy

---

### Task 13: Open Redirect
**Implementation:** Create `src/redirect.php`
```php
<?php
$url = $_GET['url'] ?? 'index.php';
// "Validate" URL (poorly)
if (strpos($url, 'http') !== false) {
    header("Location: " . $url);
} else {
    header("Location: " . $url);
}
// Hidden challenge: redirect to a secret page
if ($url === "secret-flag.php") {
    $_SESSION["solved_challenge_13"] = 1;
}
?>
```
**Exploitation:** Navigate to `/redirect.php?url=secret-flag.php`
**Difficulty:** Easy

---

### Task 14: HTTP Response Header Leak
**Implementation:** Add to API responses:
```php
header("X-Debug-Credentials: admin:backdoor123");
header("X-Admin-Token: sk_live_abc123xyz");
```
**Exploitation:**
- Mobile users can use online HTTP header checker tools
- Or apps like "HTTP Headers" for mobile
**Difficulty:** Medium

---

### Task 15: JavaScript Variable Exposure
**Implementation:** Add to any PHP page:
```html
<script>
var config = {
    apiKey: "sk-1234567890abcdef",
    adminPassword: "javascript_is_not_secure",
    debugMode: true
};
// TODO: Remove before production
var BACKUP_CREDENTIALS = {username: "backdoor", password: "letmein"};
</script>
```
**Exploitation:** View page source and find the JavaScript variables.
**Difficulty:** Easy

---

### Task 16: Path Traversal
**Implementation:** Create `src/download.php`
```php
<?php
$file = $_GET['file'] ?? 'readme.txt';
// "Sanitize" by checking extension (poorly)
if (pathinfo($file, PATHINFO_EXTENSION) === 'txt') {
    echo file_get_contents($file);
}
// Challenge: also allow php files for demo
if (strpos($file, 'secret') !== false) {
    echo "FLAG: You found the path traversal vulnerability!";
    $_SESSION["solved_challenge_16"] = 1;
}
?>
```
**Exploitation:** Navigate to `/download.php?file=../scripts/dbconn.php` or `/download.php?file=secret.txt`
**Difficulty:** Medium

---

### Task 17: QR Code Hidden Challenge
**Implementation:** Add a QR code image somewhere in the UI that links to a hidden admin page.
- QR code links to: `/hidden-admin-7x9k2m.php`
- Hidden page grants access and marks challenge complete

**Exploitation:** Scan QR code with phone camera.
**Difficulty:** Easy (and fun!)

---

### Task 18: Source Map / Debug File Exposure
**Implementation:** Create `src/scripts/app.js.map` or `src/.env`:
```
# .env file
DB_PASSWORD=mysql
ADMIN_SECRET=you_found_the_env_file
FLAG=task18_complete
```
**Exploitation:** Try accessing `/.env`, `/.git/config`, `/config.json`, etc.
**Difficulty:** Medium

---

### Task 19: Username Enumeration
**Implementation:** Modify login error messages:
```php
if (!$user_exists) {
    echo "User not found in database";  // Reveals user doesn't exist
} else if ($wrong_password) {
    echo "Incorrect password for this user";  // Confirms user exists
}
```
**Exploitation:** Try different usernames and observe error message differences.
**Difficulty:** Easy

---

### Task 20: Time-Based User Enumeration
**Implementation:** Add artificial delay for valid users:
```php
if ($user_exists) {
    sleep(2);  // Database lookup takes longer
    // Check password
} else {
    // Return immediately
}
```
**Exploitation:** Measure response times - valid usernames take ~2s, invalid take <1s.
**Difficulty:** Medium-Hard

---

## Implementation Priority (Recommended Order)

### Easy to Implement + Mobile-Friendly:
1. **HTML Comments** (Task 4) - Just add comments to existing HTML
2. **Robots.txt** (Task 5) - Create one file
3. **Base64 Token** (Task 10) - Add comment + login check
4. **JavaScript Variables** (Task 15) - Add script block
5. **Directory Listing** (Task 12) - Create backup folder
6. **IDOR** (Task 7) - Simple new page

### Medium Effort:
7. **Hidden Form Field** (Task 6)
8. **Cookie Bypass** (Task 9)
9. **Predictable Reset Token** (Task 11)
10. **Path Traversal** (Task 16)

### Fun Additions:
11. **QR Code Challenge** (Task 17) - Physical/visual element

---

## Mobile Browser Exploitation Tips

Since users won't have dev tools, document these techniques:

1. **View Source:** Most mobile browsers support viewing page source
   - iOS Safari: Add `view-source:` before URL or use Shortcuts app
   - Android Chrome: `view-source:https://example.com`
   - Firefox Mobile: Menu > Page > View Page Source

2. **URL Manipulation:** All mobile browsers allow editing the address bar

3. **Cookie Editing:**
   - Browser settings > Site data > Cookies
   - Third-party cookie editor apps

4. **HTTP Headers:** Online tools like reqbin.com or webhook.site

5. **Base64 Decoding:** Search "base64 decode" on any mobile browser

6. **QR Code Scanning:** Built into most phone cameras

7. **Form Submission:** Create a simple HTML file that posts to endpoints

---

## Summary Table

| Task | Vulnerability | Mobile Exploitable | Difficulty |
|------|--------------|-------------------|------------|
| 1 | Default Credentials | Yes - typing | Easy |
| 2 | URL Parameter Bypass | Yes - URL bar | Easy |
| 3 | SQL Injection Pattern | Yes - typing | Easy |
| 4 | HTML Comment Disclosure | Yes - view source | Easy |
| 5 | Robots.txt Disclosure | Yes - URL navigation | Easy |
| 6 | Hidden Form Field | Yes - view source + form | Medium |
| 7 | IDOR | Yes - URL parameter | Easy |
| 8 | Backup File Discovery | Yes - URL guessing | Medium |
| 9 | Cookie Bypass | Yes - browser settings | Medium |
| 10 | Base64 Token | Yes - online decoder | Easy-Medium |
| 11 | Predictable Reset Token | Yes - online MD5 | Medium |
| 12 | Directory Listing | Yes - URL navigation | Easy |
| 13 | Open Redirect | Yes - URL parameter | Easy |
| 14 | HTTP Header Leak | Medium - needs tool | Medium |
| 15 | JS Variable Exposure | Yes - view source | Easy |
| 16 | Path Traversal | Yes - URL manipulation | Medium |
| 17 | QR Code Challenge | Yes - phone camera | Easy |
| 18 | .env File Exposure | Yes - URL guessing | Medium |
| 19 | Username Enumeration | Yes - observe messages | Easy |
| 20 | Timing Attack | Yes - stopwatch | Hard |

---

*Audit conducted for educational purposes - Flinders Cybersecurity Society*
