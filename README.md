## Goals
The goals of this project are to help you:

Understand what the RESTful APIs are including best practices and conventions
Learn how to create a RESTful API
Learn about common HTTP methods like GET, POST, PUT, PATCH, DELETE
Learn about status codes and error handling in APIs
Learn how to perform CRUD operations using an API
Learn how to work with databases

## Requirements
You should create a RESTful API for a personal blogging platform. The API should allow users to perform the following operations:

Create a new blog post
Update an existing blog post
Delete an existing blog post
Get a single blog post
Get all blog posts
Filter blog posts by a search term
Given below are the details for each API operation.

## Create Blog Post
Create a new blog post using the POST method

![image](https://github.com/user-attachments/assets/978c53bd-cbe5-4168-aabe-fd6a476362a0)

The endpoint should validate the request body and return a 201 Created status code with the newly created blog post i.e.

or a 400 Bad Request status code with error messages in case of validation errors.

![image](https://github.com/user-attachments/assets/f8f96c44-d367-47d9-855d-c731b6c8de3d)

## Update Blog Post
Update an existing blog post using the PUT method
![image](https://github.com/user-attachments/assets/51b38bb7-2c3b-4eea-98f2-8935fbeb10d8)

The endpoint should validate the request body and return a 200 OK status code with the updated blog post i.e.

or a 400 Bad Request status code with error messages in case of validation errors. It should return a 404 Not Found status code if the blog post was not found.

![image](https://github.com/user-attachments/assets/7f4d922d-f262-40cf-a051-f9e04787f861)
![image](https://github.com/user-attachments/assets/24dd90f6-5b78-4946-a365-35a13628cf53)

## Delete Blog Post
Delete an existing blog post using the DELETE method

![image](https://github.com/user-attachments/assets/4c7ef618-740e-4175-80da-afee34858e2b)

The endpoint should return a 204 No Content status code if the blog post was successfully deleted or a 404 Not Found status code if the blog post was not found.

![image](https://github.com/user-attachments/assets/e3fa7365-161d-44ee-ade0-465b78b213e3)

## Get Blog Post
Get a single blog post using the GET method

![image](https://github.com/user-attachments/assets/1a902e0a-2605-439a-b1ce-3cb6311709b3)
The endpoint should return a 200 OK status code with the blog post i.e.
![image](https://github.com/user-attachments/assets/18304a94-500a-4a4d-9a4b-70e272b5ab83)
or a 404 Not Found status code if the blog post was not found.

## Get All Blog Posts
Get all blog posts using the GET method
![image](https://github.com/user-attachments/assets/39d1c507-8a9e-4da5-9b5c-0ab3a741105f)

While retrieving posts, user can also filter posts by a search term. You should do a wildcard search on the title, content or category fields of the blog posts. 
![image](https://github.com/user-attachments/assets/175d8ba1-439b-4567-b29d-6fbbf6f1e0e0)

Solution: https://roadmap.sh/projects/blogging-platform-api 
