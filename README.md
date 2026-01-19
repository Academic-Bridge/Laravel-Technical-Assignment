# Laravel Technical Assignment

# TO BE SUBMITTED BY 07:30, ON THE 26th OF JANUARY 2026

## Description

This assignment will help in assessing your technical skills. From php 8 syntax to code structure, appropriate coding principles and design patterns, and last but not least proper and relevant test coverage.

## Project

An employee management software, nothing fancy it's just a simple API with a little bit of advanced features to showcase your skills😎 and knowledge of the Laravel framework.

## Stack/Tools

- Laravel 12
- PHP Unit / Pest for tests
- Laravel Sail
- Laravel Sanctum for authentication
- laravel-snappy(for pdf reports)
- Laravel Excel(for excel reports)
- Mailpit
- OpenApi specification(v3) for documentating **all** your endpoints. Use php 8 **attributes** NOT _docblocks_

## Features

- Full stateless authentication system using Sanctum(Register, Login, Logout, Forgot password, Password reset)
- Employee CRUD, with minimum fields(names,email,employee_identifier,phone_number) all we care about is the thing to work
- Attendance management, record when an employee arrives at the office and when they leave(as simple and clear as possible no complex things)
- Send email(using queues) to the employee when an attendance record is made
- Generate attendance report(pdf & excel) with daily attendance data
- Add OpenAPI docs
- Add a clear and concise readme that explains all the needed steps to deploy in a local environment

## Bonus Points
To make your application standout from the lot🤓😉

- Add github actions that run all tests on PR events(PR creation and merge on development and master)

## Submission
- Share the link to your public github repository containing your code

**All features must be fully and properly tested!!!**

**PS: You don't need to wait until the deadline to submit your work😉**
