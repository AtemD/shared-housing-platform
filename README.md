# shuma (Shared-housing-using-matching-algorithms)
# Introduction 
This application was built to solve the problem of high rent prices and housing shortages in big cities. It allows users to list or search for shared housing (e.g. you may have a free room or sublet in your apartment or house to rent out; or you may search for someone offering one).

# How the matching algorithm works
There are three types of users on the platform: Lister ( or Host - rents or owns the property), Searcher (or Guest - looking for a place), and Admin (incharge of administering the web application).
Matching is between the Lister and Searcher.

# The Algorithm:
Step 1 (Select: price, date, and location)
The user selects the preferred price range, date to move in, and preferred location

Step 2 (answer compatibility questions)
The user then answers a list of compatibility questions related to the housing situation
The questions are of multiple choice. For each question, you provide your answer, the answer you expect from your match, and the importance of the question to your living situation (the questions importance carries a weight based on what you choose: irrelevant(0), important(10), very important(250))
Below is a sample question:

    Qn: How clean are you?
            Your answer
            a.) very clean
            b.) average 
            c.) not clean 
            
            Your match Answer 
            a.) very clean 
            b.) average 
            c.) not clean 
            
            Question Importance 
            a.) irrelevant 
            b.) important 
            c.) very important 
            
    

Step 3 (Calculate match percentage)
upon submitting the answers to the questions, the algorithms calculates the match percentage.
your answers are compared to other matched users,

Once a Lister or a Searcher completes the signup process, a job is processed in the background to create the users account profile. Upon succsssful account creation, other jobs to process are queued, some of the queued jobs include:
- place_setup_job (sets up profile for the listing), 
- match_lister_with_searcher_job (calculates the matching between Lister and searcher), 
- calculate_compatibility_match_percentage (calculates the match percentage)
- update_compatibility_match_percentage (updates the match percentage once the user updates sensitive content on their profile)

# How the matching algorithms works
User signups

## Implemented Features

Below are all the features Implemented

- Authentication
- Authorization
- Task Scheduling
- Queue Processing
- Cron Job Scheduling: deactivate inactive users, backups, etc
- Matching Algorithms
- Search Filters
- Chunking Results: for large database results - to control memory usage
- Messaging
- Favoriting 
- Send Request
- Filter Results
- Google Maps
- Social Authentication
- Notifications

Security Features Implemented 
-> System Level Security Measures: 
    - Authentication 
    - Authorization (using Access Control Levels)
    - Hashing passwords using Bycrypt algorithm
    - Protection from CSRF (Cross Site Request Forgery)
    - Protection from XSS (Cross Site Scripting)
    - Protection from specific types DOS (Denial of Service) attack e.g. limiting file size upload,     etc.) Other DOS attacks will depend on the traffic the server can handle.
    - rate limiting 
-> Database Level Security Measures:
    - Protection from SQL injection 
    - Protection from Mass Assignment vulnerability 

Recommendations:
- multilingual support 
- payments API integrations
- social login 
- auto profile-image recognition 
- report or flagging 
- online legal housing agreements 
- blog system for the site
