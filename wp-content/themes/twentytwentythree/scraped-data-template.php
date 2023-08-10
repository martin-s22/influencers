<?php
/* Template Name: Scraped Data Template */

function fetchGitHubData($url, $token) {
    $response = wp_remote_get($url, array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $token,
        ),
    ));

    if (is_array($response)) {
        $response_code = wp_remote_retrieve_response_code($response);
        if ($response_code === 403) {
            $reset_time = wp_remote_retrieve_header($response, 'X-RateLimit-Reset');
            if ($reset_time) {
                sleep(max(0, $reset_time - time())); // Wait until rate limit resets
                return fetchGitHubData($url, $token); // Retry after waiting
            }
        }
    }

    return $response;
}

$github_token = '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'; // Replace with your GitHub token
$api_url = 'https://api.github.com/users';
$scraped_data = fetchGitHubData($api_url, $github_token);

if (is_array($scraped_data) && !empty($scraped_data['body'])) {
    $scraped_content = json_decode($scraped_data['body'], true); // Parse JSON data
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scraped Data Template</title>
    <style>
        /* Your custom CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .scraped-data-container {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            outline: 2px solid #e2e2ff;
            outline-offset: -22px;
        }
        .user-card {
            display: flex;
            flex-basis: 50%;
            flex: 47%;
            align-items: center;
            padding: 10px;
            transition: background-color 0.2s;
        }
        .user-card:nth-of-type(4n+1), .user-card:nth-of-type(4n) {
            background-color: #e2e2ff;
            outline: 2px solid #fff;
            /*outline-offset: -2px;*/
        }
        .user-card:hover {
            background-color: #e2e2ff;
            outline: 2px solid #fff;
            outline-offset: -2px;
        }
        .user-card:nth-of-type(4n+1):hover, .user-card:nth-of-type(4n):hover {
            background: #fff;
            outline: 2px solid #e2e2ff;
        }
        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 10px;
            box-shadow: 0 0 2px 2px #ccc;
            border: 1px solid #8888888f !important;
        }
        .user-info {
            flex: 1;
        }
        .user-info h2 {
            margin: 0;
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: 24px;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI","Noto Sans",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
            color: #656d76;
            margin-bottom: 8px;
        }
        .user-info h3 {
            margin: 0;
            color: #1f2328;
            font-size: 24px;
            font-weight: 600;
            line-height: 1.25;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI","Noto Sans",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
        }
        .user-info p {
            margin: 5px 0;
            color: #777;
        }
        .user-info a {
            text-decoration: none;
            color: #6a6a6a;
        }
        .follow-button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .text-bold {
            font-size: 14px;
            font-weight: bold;
        }
        @media only screen and (max-width: 767px) {
            .user-card:nth-of-type(odd) {
                background-color: #e2e2ff;
            }         
            .user-card:nth-of-type(even) {
                background-color: #ffffff;
            }
            .user-card:hover {
                background-color: #e2e2ff;
            }
            .user-card:nth-of-type(odd):hover {
                background: #fff;
                outline: 2px solid #e2e2ff;
            }
            .scraped-data-container {
                max-width: 400px;
            }
        }
    </style>
</head>
<body>
    <div class="scraped-data-container">
        <?php if (!empty($scraped_content)) : ?>
            <?php foreach ($scraped_content as $user) : ?>
                <?php
                if (isset($user['login'])) {
                    $user_info_data = fetchGitHubData('https://api.github.com/users/' . $user['login'], $github_token);
                    if (is_array($user_info_data) && !empty($user_info_data['body'])) {
                        $user_info_content = json_decode($user_info_data['body'], true); // Parse JSON data
                    }
                }
                ?>
                <div class="user-card">
                    <a href="<?php echo $user['html_url']; ?>" target="_blank">
                    <img class="user-avatar" src="<?php echo $user['avatar_url']; ?>" alt="User Avatar"></a>
                    <div class="user-info">
                    <a href="<?php echo $user['html_url']; ?>" target="_blank">
                        <h3><?php echo isset($user_info_content['name']) ? $user_info_content['name'] : 'N/A'; ?></h3>
                        <h2><?php echo $user['login']; ?></h2>
                        <svg text="muted" aria-hidden="true" height="12" viewBox="0 0 16 12" version="1.1" width="16" data-view-component="true" class="octicon octicon-people">
                            <path d="M2 5.5a3.5 3.5 0 1 1 5.898 2.549 5.508 5.508 0 0 1 3.034 4.084.75.75 0 1 1-1.482.235 4 4 0 0 0-7.9 0 .75.75 0 0 1-1.482-.236A5.507 5.507 0 0 1 3.102 8.05 3.493 3.493 0 0 1 2 5.5ZM11 4a3.001 3.001 0 0 1 2.22 5.018 5.01 5.01 0 0 1 2.56 3.012.749.749 0 0 1-.885.954.752.752 0 0 1-.549-.514 3.507 3.507 0 0 0-2.522-2.372.75.75 0 0 1-.574-.73v-.352a.75.75 0 0 1 .416-.672A1.5 1.5 0 0 0 11 5.5.75.75 0 0 1 11 4Zm-5.5-.5a2 2 0 1 0-.001 3.999A2 2 0 0 0 5.5 3.5Z"></path>
                        </svg>
                        <span class="text-bold color-fg-default"><?php echo $user_info_content['followers'] ?? 'N/A'; ?></span> followers · <span class="text-bold color-fg-default"><?php echo $user_info_content['following'] ?? 'N/A'; ?></span> following</p>
                    </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No data available.</p>
        <?php endif; ?>
    </div>

    <script>
        // Your JavaScript code
        document.addEventListener('DOMContentLoaded', function() {
            // JavaScript actions based on scraped data or other interactions
        });
    </script>
</body>
</html>
