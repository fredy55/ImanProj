import { Component, OnInit } from '@angular/core';
import { BlogsService } from '../blogs.service';

@Component({
  selector: 'app-blogs',
  templateUrl: './blogs.component.html',
  styleUrls: ['./blogs.component.css']
})
export class BlogsComponent implements OnInit {

  blogTitle = 'Welcome Demo blog'
  // authors = [
  //   {
  //     name: 'John',
  //     email: 'jboy@gmail.com',
  //     score: 67
  //   },
  //   {
  //     name: 'Mary',
  //     email: 'maryg@gmail.com',
  //     score: 52
  //   },
  //   {
  //     name: 'Keneth',
  //     email: 'kboy@gmail.com',
  //     score: 45
  //   }
  // ]

  authors;

  constructor(service: BlogsService) {
    this.authors = service.getAuthors();
  }

  ngOnInit(): void {
  }

}
