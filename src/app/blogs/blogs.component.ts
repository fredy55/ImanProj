import { Component, OnInit } from '@angular/core';
import { BlogsService } from '../services/blogs.service';

@Component({
  selector: 'app-blogs',
  templateUrl: './blogs.component.html',
  styleUrls: ['./blogs.component.css']
})
export class BlogsComponent implements OnInit {

  blogTitle = 'Welcome Demo blog'
  // authors;

  // constructor(service: BlogsService) {
  //   this.authors = service.getPosts();
  // }

  posts: any;

  constructor(private service: BlogsService) { }

  ngOnInit() {
    this.service.getPosts()
      .subscribe(response => {
        this.posts = response;
      });
  }


}
