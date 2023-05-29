import requests as req
import time
import webbrowser

# API key for accessing NewsAPI
api_key = '' # Get the API key from 'https://newsapi.org/'

# Get user input for the type of news they are interested in
query = input("Which Type of News are You Interested in? ")

# Construct the URL for fetching news articles based on the user's query
news_url = f'https://newsapi.org/v2/everything?q={query}&from=2023-04-29&sortBy=publishedAt&apiKey={api_key}'

# Fetch the news articles from the API and store them in the 'news_article' variable
news_article = req.get(news_url).json()['articles']

# Display the header for the news category
print(f"\nDisplaying the Top News of {query}:")

# Create an empty list to store the URLs of the news articles
news_web_url = []

# Initialize the article count to 0
article_num = 0

# Loop to display and interact with the news articles
while article_num < len(news_article):

    # Display 5 news articles at a time
    for count in range(5):
        print(f"\nNews {article_num + 1}")
        print(f"Title: {news_article[article_num]['title']}")
        print(f"Description: {news_article[article_num]['description']}")
        print(f"Note: To Visit website Press {article_num + 1}")

        # Store the URL of each news article for opening in a web browser
        news_web_url.append(news_article[article_num]['url'])
        time.sleep(1)
        article_num += 1

        # Break the loop if the article count exceeds the total number of articles
        if article_num > len(news_article):
            break

    # Prompt the user for their action choice
    news_num = int(input('''\n-1 to Quit, -2 For More News, and News Number to Visit Source: '''))

    if news_num == -1:
        # Exit the program if the user chooses to quit
        exit()
    elif news_num == -2:
        # Continue to display more news articles if the user chooses to see more
        continue
    else:
        # Open the selected news article in a web browser
        for j in range(len(news_web_url)):
            if news_num == j + 1:
                webbrowser.open(news_web_url[j])
                exit()
