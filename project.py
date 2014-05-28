from project_module import project_object, image_object, link_object, challenge_object

p = project_object('errors', 'HTTP error pages')
p.domain = 'http://www.aidansean.com/'
p.path = 'errors'
p.preview_image_ = image_object('http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg', 408, 287)
p.github_repo_name = 'errors'
p.mathjax = False
p.links.append(link_object(p.domain, 'errors', 'Live page'))
p.introduction = 'As part of my webspace I wanted to add some humourous error pages to soften the blow when there\'s a problem.'
p.overview = '''This project works in two distinct phases: first the <code>.htaccess</code> file catches HTTP responses and redirects them before the client's browser can display an error page, and second the PHP script interprets the redirected URI and displays the relevant message.  For whimsy, a random comic from Lore Brand Comics is shown.  I've loosely followed Lore Sjoeberg's work since the Brunching Shuttlecocks started in the mid '90s.'''

p.challenges.append(challenge_object('<code>.htaccess</code> must catch a relative path from anywhere in the domain.', 'For some reason this eluded me for years.  On receiving an HTTP request error, the <code>.htaccess</code> used to redirect to an absolute path, including the full domain name, which meant that the PHP script didn\'t know the original URI.  Once I fixed this issue I could provide more useful information for the client.', 'Resolved'))

p.challenges.append(challenge_object('The data for each constituency varies in its content and structure.', 'The data contains various parties and candidates which vary from constituency to constituency.  As a result the data processing must be able to add an arbitrary list of candidates and parties per constituency.  This turned out to be trivial, using the database schema, but did add another layer of complexity to the project.', 'Resolved'))