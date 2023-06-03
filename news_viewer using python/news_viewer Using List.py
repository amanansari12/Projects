import requests as req
import time
import webbrowser

# API key for accessing NewsAPI
api_key = '' # get You API key from 'https://newsapi.org/'

# List of news categories and their corresponding API URLs
news_types = [['Tesla', f'https://newsapi.org/v2/everything?q=tesla&from=2023-04-29&sortBy=publishedAt&apiKey={api_key}'],
              ['Apple', f'https://newsapi.org/v2/everything?q=apple&from=2023-05-28&to=2023-05-28&sortBy=popularity&apiKey={api_key}'],
              ['US Business', f'https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey={api_key}'],
              ['Wall Street Journal', f'https://newsapi.org/v2/everything?domains=wsj.com&apiKey={api_key}'],
              ['TechCrunch', f'https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey={api_key}']]

print("Which News do You want to hear")

# Display the available news categories
for i in range(len(news_types)):
    print(i + 1, news_types[i][0])

# Prompt the user to choose a news category
x = int(input("Enter Your Choice: "))
news_url = ""
news_name = ''

# Retrieve the selected news category's name and URL
for i in range(len(news_types)):
    if x == i + 1:
        news_name = news_types[i][0]
        news_url = news_types[i][1]
        break

# Fetch the news articles from the API and store them
news_article = req.get(news_url).json()['articles']

print(f"\nDisplaying the Top News of {news_name}:")

news_web_url = []
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

        # Break the loop if the article count exceeds 20
        if article_num > 20:
            break

    # Prompt the user for their action choice
    news_num = int(input('''\nEnter the News Number You want to Visit or
    To close Program Enter -1
    For more news Enter -2: '''))

    if news_num == -1:
        # Exit the program
        exit()
    elif news_num == -2:
        # Continue to display more news articles
        continue
    else:
        # Open the selected news article in a web browser
        for j in range(len(news_web_url)):
            if news_num == j + 1:
                webbrowser.open(news_web_url[j])
                exit()
