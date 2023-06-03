# News Article Viewer

The code is a News Article Viewer that fetches and displays news articles based on user input. Here's how it works:

1. The user is prompted to enter the type of news they are interested in.

2. An API key from NewsAPI is required to access the NewsAPI services. The code expects you to obtain an API key from 'https://newsapi.org/' and assign it to the `api_key` variable.

3. The URL for fetching news articles is constructed using the user's query and the API key.

4. The code makes a request to the NewsAPI using the `requests.get()` method, passing the constructed URL. The response is retrieved in JSON format, and the articles are extracted and stored in the `news_article` variable.

5. The header is displayed to indicate the category of news being shown.

6. An empty list called `news_web_url` is created to store the URLs of the news articles.

7. An article counter, `article_num`, is initialized to 0.

8. A loop is started to display and interact with the news articles. It continues until all articles are displayed or until the user chooses to exit.

9. Within the loop, 5 news articles are displayed at a time. The article's title and description are printed. The URL of each article is stored in the `news_web_url` list.

10. The loop allows the user to choose their action. They can enter -1 to quit, -2 to see more news articles, or the number of the news article to open its source in a web browser.

11. If the user chooses to quit, the program exits.

12. If the user chooses to see more news articles, the loop continues to display the next set of articles.

13. If the user chooses to visit a source, the corresponding URL is retrieved from the `news_web_url` list, and the web browser is opened with the selected news article.

That's the overview of the code's functionality. It fetches news articles based on user input, displays them, and allows the user to interact with the articles by opening the source URLs.
