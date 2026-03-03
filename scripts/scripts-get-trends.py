#!/usr/bin/env python3

"""
Trending Topics Fetcher
Retrieves trending cleaning-related topics from Google Trends for Pakistan
"""

import json
import sys
import logging
from datetime import datetime, timedelta
from typing import List, Dict
import requests

# Try to import pytrends, fall back gracefully if not available
try:
    from pytrends.request import TrendReq
    PYTRENDS_AVAILABLE = True
except ImportError:
    PYTRENDS_AVAILABLE = False
    print("Warning: pytrends not installed. Install with: pip install pytrends", file=sys.stderr)

# Configure logging
logging.basicConfig(
    level=logging.INFO,
    format='%(asctime)s - %(levelname)s - %(message)s'
)
logger = logging.getLogger(__name__)


class TrendingTopicsFetcher:
    """Fetch trending topics related to cleaning services"""
    
    def __init__(self):
        self.trending_topics = []
        self.related_queries = {}
        self.interest_by_region = {}
        
    def fetch_from_google_trends(self, keywords: List[str], geo: str = 'PK') -> List[str]:
        """
        Fetch trending topics from Google Trends
        
        Args:
            keywords: List of keywords to search
            geo: Geographic code (PK = Pakistan)
        
        Returns:
            List of trending topics
        """
        
        if not PYTRENDS_AVAILABLE:
            logger.warning("pytrends not available, using fallback trends")
            return self._get_fallback_trends(keywords)
        
        try:
            pytrends = TrendReq(hl='en-US', tz=360)  # Pakistan timezone
            
            # Get trending searches for Pakistan
            logger.info(f"Fetching trending searches for Pakistan...")
            trending_df = pytrends.trending_searches(pn='pakistan')
            
            if trending_df is not None and not trending_df.empty:
                trending_list = trending_df[0].tolist()
                
                # Filter for cleaning-related terms
                filtered_trends = [
                    trend for trend in trending_list
                    if any(
                        keyword.lower() in trend.lower()
                        for keyword in keywords
                    )
                ]
                
                self.trending_topics.extend(filtered_trends)
                logger.info(f"Found {len(filtered_trends)} relevant trending topics")
            
            # Get related queries for main keywords
            for keyword in keywords:
                try:
                    logger.info(f"Fetching related queries for: {keyword}")
                    pytrends.build_payload(
                        [keyword],
                        cat=0,
                        timeframe='now 1-m',
                        geo=geo
                    )
                    related = pytrends.related_queries()
                    if keyword in related and related[keyword]['top'] is not None:
                        queries = related[keyword]['top']['query'].tolist()
                        self.related_queries[keyword] = queries
                        self.trending_topics.extend(queries[:3])  # Top 3 related
                except Exception as e:
                    logger.warning(f"Error fetching related queries for {keyword}: {e}")
                    
        except Exception as e:
            logger.error(f"Error fetching from Google Trends: {e}")
            return self._get_fallback_trends(keywords)
        
        return list(set(self.trending_topics))
    
    def _get_fallback_trends(self, keywords: List[str]) -> List[str]:
        """
        Fallback trending topics when API is unavailable
        
        Args:
            keywords: List of keywords
        
        Returns:
            List of relevant trending topics
        """
        
        logger.info("Using fallback trending topics database")
        
        # Seasonal and evergreen trending topics for cleaning services
        fallback_trends = {
            'cleaning': [
                'eco-friendly cleaning',
                'sustainable cleaning practices',
                'health and hygiene',
                'chemical-free cleaning',
                'professional cleaning service',
                'time-saving cleaning tips',
                'home organization',
                'spring cleaning 2024',
            ],
            'seasonal': [
                'spring cleaning',
                'deep cleaning',
                'pre-wedding cleaning',
                'monsoon season cleaning',
                'post-wedding cleanup',
            ],
            'local_pakistan': [
                'karachi cleaning service',
                'lahore professional cleaner',
                'islamabad house cleaning',
                'pakistan home services',
                'affordable cleaning karachi',
                'trusted cleaning company',
            ],
            'health_related': [
                'allergen removal',
                'dust mite elimination',
                'disinfection service',
                'hygiene standard',
                'healthy home',
                'germ removal',
            ],
            'special_services': [
                'carpet restoration',
                'sofa refurbishment',
                'move-out cleaning',
                'post-construction cleanup',
                'commercial janitorial',
            ],
        }
        
        # Return relevant trends based on keywords
        trends = []
        for category, items in fallback_trends.items():
            for item in items:
                if any(keyword.lower() in item.lower() for keyword in keywords):
                    trends.append(item)
        
        # If no matches, return general cleaning trends
        if not trends:
            trends = fallback_trends['cleaning'][:5]
        
        return list(set(trends))
    
    def fetch_reddit_discussions(self, keywords: List[str], subreddits: List[str] = None) -> List[str]:
        """
        Fetch trending discussions from Reddit (optional)
        
        Args:
            keywords: List of keywords
            subreddits: List of subreddit names to search
        
        Returns:
            List of trending topics from Reddit
        """
        
        if subreddits is None:
            subreddits = ['r/cleaning', 'r/homeimprovement', 'r/pakistan']
        
        reddit_trends = []
        
        # This would require PRAW library - optional enhancement
        logger.info("Reddit scraping not implemented - use API with authentication")
        
        return reddit_trends
    
    def get_seasonal_trends(self) -> Dict[str, List[str]]:
        """
        Get seasonal trends relevant to cleaning services
        
        Returns:
            Dictionary of seasonal trends
        """
        
        current_month = datetime.now().month
        
        seasonal_map = {
            1: 'New Year Organizing',  # January
            2: 'Winter Cleanup',
            3: 'Spring Cleaning',  # March
            4: 'Spring Maintenance',
            5: 'Summer Prep',
            6: 'Pre-Monsoon Deep Clean',  # June (Pakistan)
            7: 'Monsoon Prevention',  # July
            8: 'Monsoon Management',
            9: 'Post-Monsoon Repair',  # September
            10: 'Fall Cleaning',
            11: 'Pre-Winter Prep',
            12: 'Year-End Deep Clean',
        }
        
        current_season = seasonal_map.get(current_month, 'General Cleaning')
        
        return {
            'current_season': current_season,
            'month': current_month,
        }
    
    def get_all_trends(self, keywords: List[str]) -> Dict[str, any]:
        """
        Get all available trends
        
        Args:
            keywords: List of keywords
        
        Returns:
            Dictionary containing all trend data
        """
        
        logger.info("Fetching all trending topics...")
        
        return {
            'timestamp': datetime.now().isoformat(),
            'trending_topics': self.fetch_from_google_trends(keywords),
            'related_queries': self.related_queries,
            'seasonal': self.get_seasonal_trends(),
            'top_keywords': keywords[:5],
        }


def main():
    """Main entry point"""
    
    try:
        # Get keywords from command line argument
        if len(sys.argv) > 1:
            keywords = json.loads(sys.argv[1])
        else:
            # Default keywords
            keywords = [
                'carpet cleaning',
                'sofa cleaning',
                'deep cleaning',
                'office cleaning',
                'cleaning services',
            ]
        
        logger.info(f"Fetching trends for keywords: {keywords}")
        
        # Fetch trends
        fetcher = TrendingTopicsFetcher()
        trends = fetcher.get_all_trends(keywords)
        
        # Output as JSON
        print(json.dumps(trends, indent=2))
        
    except json.JSONDecodeError as e:
        logger.error(f"Invalid JSON input: {e}")
        print(json.dumps({'error': 'Invalid JSON input', 'trending_topics': []}))
        sys.exit(1)
    except Exception as e:
        logger.error(f"Error fetching trends: {e}")
        print(json.dumps({'error': str(e), 'trending_topics': []}))
        sys.exit(1)


if __name__ == '__main__':
    main()
